<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'status',
        'score',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Get the user that owns the exam.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the exam.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    /**
     * The questions that belong to the exam.
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Questions::class, 'exam_questions')
            ->withPivot('user_answer', 'is_correct')
            ->withTimestamps();
    }

    /**
     * Calculate the score for the exam.
     */
    public function calculateScore(): int
    {
        return $this->questions()
            ->wherePivot('is_correct', true)
            ->count();
    }
}