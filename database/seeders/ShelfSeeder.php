<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Yaml\Yaml;
use App\Models\Shelf;
use Carbon\Carbon;

class ShelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('seeders/seed/shelf.yml');
        $contents = file_get_contents($filePath);
        $data = Yaml::parse($contents);

        $now = Carbon::now();

        foreach ($data as $shelf) {
            $shelf['created_at'] = $now;
            Shelf::create($shelf);
        }
    }
}
