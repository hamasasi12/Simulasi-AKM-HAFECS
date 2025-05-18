<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Questions;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $categories = collect();

        if (Auth::user()->hasRole('SD')) {
            $categories = Categories::whereIn('id', [1, 2])->get();
            $query = Questions::whereIn('category_id', [1, 2]);
        } elseif (Auth::user()->hasRole('SMP')) {
            $categories = Categories::whereIn('id', [3, 4])->get();
            $query = Questions::whereIn('category_id', [3, 4]);
        } elseif (Auth::user()->hasRole('SMA')) {
            $categories = Categories::whereIn('id', [5, 6])->get();
            $query = Questions::whereIn('category_id', [5, 6]);

        } else {
            $categories = Categories::all();
        }

        return view('students.indexCategory', [
            'categories' => $categories,
            'query' => $query,
        ]);
    }

    public function start(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        // Check if user has unfinished exam
        $unfinishedExam = Exam::where('user_id', Auth::id())
            ->where('category_id', $validated['category_id'])
            ->where('status', 'started')
            ->first();

        if ($unfinishedExam) {
            return redirect()->route('exams.continue', $unfinishedExam);
        }

        // Create new exam
        $exam = Exam::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'status' => 'started',
            'start_time' => now(),
        ]);

        // Get 30 random questions from the category
        $questions = Questions::where('category_id', $validated['category_id'])
            ->inRandomOrder()
            ->limit(30)
            ->get();

        // Attach questions to exam
        foreach ($questions as $question) {
            $exam->questions()->attach($question->id);
        }

        return redirect()->route('exams.show', $exam);
    }

    public function show(Exam $exam)
    {
        // Ensure the exam belongs to the authenticated user
        if ($exam->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $questions = $exam->questions()->paginate(1);
        $totalQuestions = $exam->questions()->count();
        $answeredQuestions = $exam->questions()->wherePivotNotNull('user_answer')->count();

        return view('students.show', compact('exam', 'questions', 'totalQuestions', 'answeredQuestions'));
    }

    public function answer(Request $request, Exam $exam)
    {
        // Ensure the exam belongs to the authenticated user
        if ($exam->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'user_answer' => 'required|in:a,b,c,d',
        ]);

        // Get the question
        $question = Questions::findOrFail($validated['question_id']);

        // Check if the answer is correct
        $isCorrect = $question->correct_answer === $validated['user_answer'];

        // Update the pivot record
        $exam->questions()->updateExistingPivot($validated['question_id'], [
            'user_answer' => $validated['user_answer'],
            'is_correct' => $isCorrect,
        ]);

        // Redirect to the next question or to the finish page
        if ($request->has('next_question')) {
            return redirect()->route('exams.show', [
                'exam' => $exam,
                'page' => $request->input('next_question'),
            ]);
        }

        return redirect()->route('exams.show', $exam);
    }

    public function finish(Exam $exam)
    {
        if ($exam->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Calculate score
        $score = $exam->calculateScore();

        // Update exam
        $exam->update([
            'status' => 'finished',
            'end_time' => now(),
            'score' => $score,
        ]);

        return redirect()->route('exams.result', $exam);
    }

     public function result(Exam $exam)
    {
        // Ensure the exam belongs to the authenticated user
        if ($exam->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $totalQuestions = $exam->questions()->count();
        $correctAnswers = $exam->questions()->wherePivot('is_correct', true)->count();
        $wrongAnswers = $exam->questions()->wherePivot('is_correct', false)->count();
        $unansweredQuestions = $totalQuestions - ($correctAnswers + $wrongAnswers);

        return view('students.result', compact(
            'exam',
            'totalQuestions',
            'correctAnswers',
            'wrongAnswers',
            'unansweredQuestions'
        ));
    }
}
