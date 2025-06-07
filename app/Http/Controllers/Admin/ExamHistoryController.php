<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ExamHistoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::pluck('name', 'id');

        $exams = Exam::with('user', 'category')
            ->when($request->keyword, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->keyword . '%');
                });
            })
            ->when($request->jenjang, function ($query) use ($request) {
                $query->whereHas('user', function ($q) use ($request) {
                    $q->where('jenjang_pendidikan', $request->jenjang);
                });
            })
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->paginate(10)
            ->appends($request->all()); // biar pagination tetap bawa filter

        return view('admin.ExamHistory.index', [
            'navTitle' => 'Exam History',
            'categories' => $categories,
            'exam' => $exams,
            'examCount' => $exams->total(),
        ]);
    }


    public function edit(string $id)
    {

    }

    public function update(Request $requesst, string $id)
    {

    }

    public function show(string $id)
    {
        return view('admin.examHistory.show', [
            'navTitle' => 'Exam History',
            'exam' => Exam::findOrFail($id)
        ]);
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $exam = Exam::findOrFail($id);
            $exam->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting exam: ' . $e->getMessage());
            return response()->json(['error' => 'Exam not found'], 404);
        }
    }
}
