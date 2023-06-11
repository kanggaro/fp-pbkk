<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $books = Book::query()
            ->where('name', 'LIKE', "%$search%")
            ->get();
        
        return view('books', compact('books'));
    }
}
