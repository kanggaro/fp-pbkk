<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    /**
     * Retrieve all books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('authors', 'categories', 'shelves', 'publishers')->get();
        
        return response()->json($books);
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'isbn' => 'required',
            'year_released' => 'required',
            'pages' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required',
            'authors' => 'required|array',
            'authors.*' => 'exists:authors,name',
            'publishers' => 'required|array',
            'publishers.*' => 'exists:publishers,name',
            'shelves' => 'required|array',
            'shelves.*' => 'exists:shelves,number',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,name',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Create a new book using the validated data
        $bookData = $request->all();

        // Get the IDs of the authors, publishers, shelves, and categories based on their names
        $authorIds = Author::whereIn('name', $bookData['authors'])->pluck('id')->all();
        $publisherIds = Publisher::whereIn('name', $bookData['publishers'])->pluck('id')->all();
        $shelfIds = Shelf::whereIn('number', $bookData['shelves'])->pluck('id')->all();
        $categoryIds = Category::whereIn('name', $bookData['categories'])->pluck('id')->all();

        // Remove the relationship names from the book data
        unset($bookData['authors']);
        unset($bookData['publishers']);
        unset($bookData['shelves']);
        unset($bookData['categories']);

        // Create a new book with the remaining book data
        $book = Book::create($bookData);

        // Attach the relationships using the retrieved IDs
        $book->authors()->sync($authorIds);
        $book->publishers()->sync($publisherIds);
        $book->shelves()->sync($shelfIds);
        $book->categories()->sync($categoryIds);

        // Return a success response with the created book
        return response()->json($book, 201);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }

        // Retrieve any additional related data if needed
        $book->load('categories', 'publishers', 'authors', 'shelves');

        if (!$book) {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }

        return response()->json($book);
    }

    /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'string',
            'isbn' => 'string',
            'year_released' => 'string',
            'pages' => 'integer',
            'quantity' => 'integer',
            'description' => 'string',
            'categories' => 'string',
            'publishers' => 'string',
            'authors' => 'array',
            'shelves' => 'array',
        ]);

        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }

        // Update the book attributes
        $book->fill($validatedData);
        $book->save();

        // Update the related relationships if provided
        if (isset($validatedData['categories'])) {
            $category = Category::where('name', $validatedData['categories'])->first();
            $book->category()->associate($category);
        }

        if (isset($validatedData['publishers'])) {
            $publisher = Publisher::where('name', $validatedData['publishers'])->first();
            $book->publisher()->associate($publisher);
        }

        if (isset($validatedData['authors'])) {
            $authors = Author::whereIn('name', $validatedData['authors'])->get();
            $book->authors()->sync($authors);
        }

        if (isset($validatedData['shelves'])) {
            $shelves = Shelf::whereIn('number', $validatedData['shelves'])->get();
            $book->shelves()->sync($shelves);
        }

        return response()->json($book);
    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Book successfully deleted'
        ], 200);
    }


    public function getByAuthor($authorName)
    {
        $author = Author::where('name', $authorName)->first();

        if (!$author) {
            return response()->json([
                'message' => 'Author not found',
            ], 404);
        }

        $books = Book::whereHas('authors', function ($query) use ($authorName) {
            $query->where('name', $authorName);
        })->with('authors', 'categories', 'shelves', 'publishers')->get();

        return response()->json($books);
    }


    public function getByCategory($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
    
        if (!$category) {
            return response()->json([
                'message' => 'Category not found',
            ], 404);
        }
    
        $books = Book::whereHas('categories', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->with('authors', 'categories', 'shelves', 'publishers')->get();
    
        return response()->json($books);
    }

    public function getByShelf($shelfNumber)
    {
        $shelf = Shelf::where('number', $shelfNumber)->first();

        if (!$shelf) {
            return response()->json([
                'message' => 'Shelf not found',
            ], 404);
        }

        $books = Book::whereHas('shelves', function ($query) use ($shelfNumber) {
            $query->where('number', $shelfNumber);
        })->with('authors', 'categories', 'shelves', 'publishers')->get();

        return response()->json($books);
    }

    public function getByPublisher($publisherName)
    {
        $publisher = Publisher::where('name', $publisherName)->first();

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found',
            ], 404);
        }

        $books = Book::whereHas('publishers', function ($query) use ($publisherName) {
            $query->where('name', $publisherName);
        })->with('authors', 'categories', 'shelves', 'publishers')->get();

        return response()->json($books);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->query('name');

        $books = Book::where('name', 'LIKE', '%'.$searchTerm.'%')
            ->with('authors', 'categories', 'shelves', 'publishers')
            ->get();

        if ($books->isEmpty()) {
            return response()->json([
                'message' => 'No books found',
            ], 404);
        }

        // Return the search results with relationships
        return response()->json([
            'data' => $books,
        ]);
    }
}