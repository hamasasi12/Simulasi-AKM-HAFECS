<?php

// File: app/Http/Livewire/ExamHeader.php

namespace App\Http\Livewire;

use Livewire\Component;

class ExamHeader extends Component
{
    public $exam;
    public $questions;
    public $totalQuestions;
    public $answeredQuestions;
    public $timeLeft = 3600; // in seconds, 60 minutes

    public function mount($exam, $questions, $totalQuestions, $answeredQuestions)
    {
        $this->exam = $exam;
        $this->questions = $questions;
        $this->totalQuestions = $totalQuestions;
        $this->answeredQuestions = $answeredQuestions;
    }

    public function decrementTime()
    {
        if ($this->timeLeft > 0) {
            $this->timeLeft--;
        }
    }

    public function render()
    {
        return view('livewire.exam-header');
    }
}
