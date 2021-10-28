<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BikeCategory;

class BikeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Rowery miejskie'],
            ['name' => 'Rowery górskie'],
            ['name' => 'Rowery turystyczne'],
            ['name' => 'Rowery szosowe'],
            ['name' => 'MTB XC'],
            ['name' => 'Gravel']
        ];
        BikeCategory::insert($data);
    }
}
