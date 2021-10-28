<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['question' => 'Czy mogę zrezygnować z rezerwacji?', 'answer' => "Tak"],
            ['question' => 'Jak mogę dokonać rezygnacji?', 'answer' => "Poprzez specjalnie przygotowany formularz"],
            ['question' => 'Czy planują państwo zwiększenie ilości dostępnych modeli?', 'answer' => "W miarę zwiększenia zainteresowania"]
        ];
        Faq::insert($data);
    }
}
