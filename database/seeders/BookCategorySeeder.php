<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('seeders/seed/book_category.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $bookCategoryData) {
            $bookName = $bookCategoryData['book'];
            $categoryName = $bookCategoryData['category'];

            $book = Book::where('name', $bookName)->first();
            $category = Category::where('name', $categoryName)->first();

            $book->categories()->attach($category, ['created_at' => $now]);
        }
    }
}
