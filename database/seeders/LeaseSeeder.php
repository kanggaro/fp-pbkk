<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Lease;
use App\Models\Book;
use App\Models\User;
use Symfony\Component\Yaml\Yaml;

class LeaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('seeders/seed/lease.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $leaseData) {
            $bookName = $leaseData['book'];
            $userEmail = $leaseData['user'];
            $leaseTime = $leaseData['lease_time'];
            $returnTime = $leaseData['return_time'];

            $book = Book::where('name', $bookName)->first();
            $user = User::where('email', $userEmail)->first();

            Lease::create([
                'book_id' => $book->id,
                'user_id' => $user->id,
                'lease_time' => $leaseTime,
                'return_time' => $returnTime,
                'created_at' => $now,
            ]);
        }
    }
}