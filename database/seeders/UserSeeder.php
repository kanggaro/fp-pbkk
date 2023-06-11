<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        $filePath = database_path('seeders/seed/user.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $userData) {
            User::create([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'email' => $userData['email'],
                'phone_number' => $userData['phone_number'],
                'password' => Hash::make($userData['password']),
                'created_at' => $now
            ]);
        }
    }
}