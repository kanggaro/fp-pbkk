<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class BookShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('seeders/seed/book_shelf.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $bookShelfData) {
            $bookName = $bookShelfData['book'];
            $shelfNumber = $bookShelfData['shelf'];

            $book = Book::where('name', $bookName)->first();
            $shelf = Shelf::where('number', $shelfNumber)->first();

            $book->shelves()->attach($shelf, ['created_at' => $now]);
        }
    }
}
