<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questions;
use Illuminate\Support\Str;

class QuestionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($categoryId = 1; $categoryId <= 6; $categoryId++) {
            for ($i = 1; $i <= 30; $i++) {
                Questions::create([
                    'category_id'    => $categoryId,
                    'question_text'  => "Soal ke-$i untuk kategori $categoryId asdasdasdas asd asd aas das das dasdasdasdasdhasdjkhas dasjdh askjhdjkashduashdas dsakjdha sdjkhasjkdh askjdhoaudajshdk jasdkjashdjkas dhajsdhasidhashdkasjdh askjdhasjkdhasodhaskd haskjdhas daksjhd aksdhaskjdhaskjdhasd asdkasdjashda sd asd",
                    'image'          => null,
                    'option_a'       => 'Pilihan A',
                    'option_b'       => 'Pilihan B',
                    'option_c'       => 'Pilihan C',
                    'option_d'       => 'Pilihan D',
                    'option_e'       => 'Pilihan E',
                    'correct_answer' => 'A', // bisa di-random kalau mau
                ]);
            }
        }
    }
}
