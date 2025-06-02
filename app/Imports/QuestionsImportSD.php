<?php

namespace App\Imports;

use App\Models\Questions;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionsImportSD implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Questions([
            'category_id'     => $row['category_id'],       // pastikan nama kolom Excel lowercase dan snake_case
            'question_text'   => $row['question_text'],
            'image'           => $row['image'],             // kosongin kalau gak pake image
            'option_a'        => $row['option_a'],
            'option_b'        => $row['option_b'],
            'option_c'        => $row['option_c'],
            'option_d'        => $row['option_d'],
            'option_e'        => $row['option_e'],
            'correct_answer'  => $row['correct_answer'],
        ]);
    }
}
