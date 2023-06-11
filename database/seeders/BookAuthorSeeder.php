<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('seeders/seed/book_author.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $bookAuthorData) {
            $bookName = $bookAuthorData['book'];
            $authorNames = $bookAuthorData['authors'];

            $book = Book::where('name', $bookName)->first();
            $authors = Author::whereIn('name', $authorNames)->get();

            foreach ($authors as $author) {
                $book->authors()->attach($author->id, ['created_at' => $now]);
            }
        }
    }
}