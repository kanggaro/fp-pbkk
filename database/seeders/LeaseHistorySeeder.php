<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lease;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class LeaseHistorySeeder extends Seeder
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

        foreach ($data as $leaseHistoryData) {
            $bookName = $leaseHistoryData['book'];
            $userEmail = $leaseHistoryData['user'];
            $leaseTime = $leaseHistoryData['lease_time'];

            $book = Lease::whereHas('book', function ($query) use ($bookName) {
                $query->where('name', $bookName);
            })->first();

            $user = User::where('email', $userEmail)->first();
            
            if ($book && $user) {
                $lease = Lease::where('book_id', $book->book_id)
                    ->where('user_id', $user->id)
                    ->where('lease_time', $leaseTime)
                    ->first();

                if ($lease) {
                    DB::table('lease_history')->insert([
                        'user_id' => $user->id,
                        'lease_id' => $lease->id,
                        'created_at' => $now
                    ]);
                }
            }
        }
    }
}
