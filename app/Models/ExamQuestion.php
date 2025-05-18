<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExamQuestion extends Pivot
{
    protected $table = 'exam_questions';
    
    protected $fillable = [
        'exam_id',
        'question_id',
        'user_answer',
        'is_correct',
    ];
}