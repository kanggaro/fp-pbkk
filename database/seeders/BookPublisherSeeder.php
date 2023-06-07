<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class BookPublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('seeders/seed/book_publisher.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $bookPublisherData) {
            $bookName = $bookPublisherData['book'];
            $publisherName = $bookPublisherData['publisher'];

            $book = Book::where('name', $bookName)->first();
            $publisher = Publisher::where('name', $publisherName)->first();

            $book->publishers()->attach($publisher, ['created_at' => $now]);
        }
    }
}
