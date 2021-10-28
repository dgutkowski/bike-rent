<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bike;

class BikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Przykładowy rower 1', 'description' => "Przykładowy opis jaki można tu dodać 1", 'features' => "Niska rama", 'cost' => 30],
            ['name' => 'Przykładowy rower 2', 'description' => "Przykładowy opis jaki można tu dodać 2", 'features' => "Niska rama, hamulce tarczowe", 'cost' => 45],
            ['name' => 'Przykładowy rower 3', 'description' => "Przykładowy opis jaki można tu dodać 3", 'features' => "Cechy", 'cost' => 25],
            ['name' => 'Przykładowy rower 4', 'description' => "Przykładowy opis jaki można tu dodać 4", 'features' => "Cechy 1, cecha 2, cecha 3", 'cost' => 30],
            ['name' => 'Przykładowy rower 5', 'description' => "Przykładowy opis jaki można tu dodać 5", 'features' => "Cechy 1, cecha 2", 'cost' => 40],
            ['name' => 'Przykładowy rower 6', 'description' => "Przykładowy opis jaki można tu dodać 6", 'features' => "Cechy 1, cecha 2, cecha 4", 'cost' => 50],
            ['name' => 'Przykładowy rower 7', 'description' => "Przykładowy opis jaki można tu dodać 7", 'features' => "", 'cost' => 30]
        ];
        Bike::insert($data);
    }
}
