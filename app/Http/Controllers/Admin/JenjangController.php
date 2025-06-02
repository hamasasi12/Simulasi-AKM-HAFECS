<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Exception;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class JenjangController extends Controller
{
    public function indexJenjangSD(Request $request)
    {
        $query = Questions::whereIn('category_id', [1, 2]);

        if ($request->filled('keyword')) {
            $query->where('question_text', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        $questions = $query->latest()->paginate(10)->withQueryString(); // biar pagination tetep bawa keyword
        $questionCount = $query->count();
        $categories = Categories::whereIn('id', [1, 2])->get();


        return view('admin.jenjang.SD.index', [
            'navTitle' => 'Jenjang SD',
            'questions' => $questions,
            'questionCount' => $questionCount,
            'categories' => $categories,
        ]);
    }


    public function createJenjangSD()
    {
        return view('admin.jenjang.SD.create', [
            'navTitle' => 'Create Soal Jenjang Sd'
        ]);
    }

    public function storeJenjangSD(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d,e',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('question_sd_img', 'public');
                $validated['image'] = $path;
            }

            Questions::create($validated);
            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.dashboard.jenjang.sd.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error adding soal', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            Alert::error('error', 'Terjadi kesalahan saat menambahkan soal.');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan soal.');
        }
    }

    public function editJenjangSD(string $id)
    {
        $categoriesA = Categories::all();
        $question = Questions::find($id);
        $categoriesEdit = Categories::where('id', $question->category_id)->first();

        if (!$question) {
            return redirect()->route('admin.dashboard.jenjang.sd.index')->with('error', 'Data soal jenjang SD tidak ditemukan.');
        }

        return view('admin.jenjang.SD.edit', [
            'navTitle' => 'Edit Soal Jenjang SD',
            'categoriesA' => $categoriesA,
            'question' => $question,
            'categoriesEdit' => $categoriesEdit,
        ]);
    }

    public function updateJenjangSD(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d,e',
        ]);

        DB::beginTransaction();

        try {
            $question = Questions::findOrFail($id);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($question->image && Storage::disk('public')->exists($question->image)) {
                    Storage::disk('public')->delete($question->image);
                }

                // Store new image
                $path = $request->file('image')->store('question_sd_img', 'public');
                $validated['image'] = $path;
            } else {
                // Keep the existing image if no new image is uploaded
                unset($validated['image']);
            }

            $question->update($validated);
            Log::info('Question updated successfully', [
                'id' => $id,
                'user_id' => auth()->id(),
                'data' => $validated
            ]);

            DB::commit();
            Alert::success('success', 'Soal berhasil diupdate.');
            return redirect()->route('admin.dashboard.jenjang.sd.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to update question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString() // Added stack trace for better debugging
            ]);
            Alert::error('error', 'Terjadi kesalahan saat mengupdate soal.');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate soal.');
        }
    }

    public function showJenjangSD(string $id)
    {
        $questions = Questions::with('category')->where('id', $id)->first();
        return view('admin.jenjang.SD.show', [
            'navTitle' => 'Detail Soal Jenjang SD',
            'questionA' => $questions
        ]);
    }

    public function deleteJenjangSD(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $questions = Questions::find($id);

            $questionData = [
                'id' => $questions->id,
                'title' => $questions->title ?? 'N/A',
                'had_image' => !empty($questions->image)
            ];

            if ($questions->image && Storage::exists($questions->image)) {
                Storage::delete($questions->image);
            }

            $questions->delete();

            DB::commit();

            Alert::success('success', 'Soal berhasil dihapus.');
            return redirect()->route('admin.dashboard.jenjang.sd.index');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Failed to delete question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'timestamp' => now()
            ]);

            Alert::error('error', 'Gagal menghapus soal.');
            return back()->with('error', 'Gagal menghapus soal: ' . $e->getMessage());
        }
    }


    // JENJANG SMP
    public function indexJenjangSMP(Request $request)
    {
        $query = Questions::whereIn('category_id', [3, 4]);

        if ($request->filled('keyword')) {
            $query->where('question_text', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        $questions = $query->latest()->paginate(10)->withQueryString(); // biar pagination tetep bawa keyword
        $questionCount = $query->count();
        $categories = Categories::whereIn('id', [3, 4])->get();


        return view('admin.jenjang.SMP.index', [
            'navTitle' => 'Jenjang SMP',
            'questions' => $questions,
            'questionCount' => $questionCount,
            'categories' => $categories,
        ]);
    }

    public function createJenjangSMP()
    {
        return view('admin.jenjang.SMP.create', [
            'navTitle' => 'Create Soal Jenjang SMP'
        ]);
    }

    public function showJenjangSMP(string $id)
    {
        $questions = Questions::with('category')->where('id', $id)->first();
        return view('admin.jenjang.SMP.show', [
            'navTitle' => 'Detail Soal Jenjang SMP',
            'questionA' => $questions
        ]);
    }

    public function storeJenjangSMP(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d,e',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('question_smp_img', 'public');
                $validated['image'] = $path;
            }

            Questions::create($validated);
            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.dashboard.jenjang.smp.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error adding soal', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            Alert::error('error', 'Terjadi kesalahan saat menambahkan soal.');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan soal.');
        }
    }

    public function editJenjangSMP(string $id)
    {
        $categoriesA = Categories::all();
        $queryCategories = Categories::whereIn('id', [3, 4])->get();
        $question = Questions::find($id);
        $categoriesEdit = Categories::where('id', $question->category_id)->first();

        if (!$question) {
            return redirect()->route('admin.dashboard.jenjang.smp.index')->with('error', 'Data soal jenjang SMP tidak ditemukan.');
        }

        return view('admin.jenjang.SMP.edit', [
            'navTitle' => 'Edit Soal Jenjang SMP',
            'categoriesA' => $categoriesA,
            'question' => $question,
            'categoriesEdit' => $categoriesEdit,
            'queryCategories' => $queryCategories,
        ]);
    }

    public function updateJenjangSMP(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d,e',
        ]);

        DB::beginTransaction();

        try {
            $question = Questions::findOrFail($id);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($question->image && Storage::disk('public')->exists($question->image)) {
                    Storage::disk('public')->delete($question->image);
                }

                // Store new image
                $path = $request->file('image')->store('question_smp_img', 'public');
                $validated['image'] = $path;
            } else {
                // Keep the existing image if no new image is uploaded
                unset($validated['image']);
            }

            $question->update($validated);
            Log::info('Question updated successfully', [
                'id' => $id,
                'user_id' => auth()->id(),
                'data' => $validated
            ]);

            DB::commit();
            Alert::success('success', 'Soal berhasil diupdate.');
            return redirect()->route('admin.dashboard.jenjang.smp.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to update question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString() // Added stack trace for better debugging
            ]);
            Alert::error('error', 'Terjadi kesalahan saat mengupdate soal.');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate soal.');
        }

    }

    public function deleteJenjangSMP(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $questions = Questions::find($id);

            $questionData = [
                'id' => $questions->id,
                'title' => $questions->title ?? 'N/A',
                'had_image' => !empty($questions->image)
            ];

            if ($questions->image && Storage::exists($questions->image)) {
                Storage::delete($questions->image);
            }

            $questions->delete();

            DB::commit();

            Alert::success('success', 'Soal berhasil dihapus.');
            return redirect()->route('admin.dashboard.jenjang.smp.index');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Failed to delete question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'timestamp' => now()
            ]);

            Alert::error('error', 'Gagal menghapus soal.');
            return back()->with('error', 'Gagal menghapus soal: ' . $e->getMessage());
        }
    }

    public function indexJenjangSMA(Request $request)
    {
        $query = Questions::whereIn('category_id', [5, 6]);

        if ($request->filled('keyword')) {
            $query->where('question_text', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        $questions = $query->latest()->paginate(10)->withQueryString(); // 
        $questionCount = $query->count();
        $categories = Categories::whereIn('id', [5, 6])->get();


        return view('admin.jenjang.SMA.index', [
            'navTitle' => 'Jenjang SMA',
            'questions' => $questions,
            'questionCount' => $questionCount,
            'categories' => $categories,
        ]);
    }

    public function editJenjangSMA(string $id)
    {
        return view('admin.jenjang.SMA.edit', [
            'navTitle' => 'Edit Soal Jenjang SMA'
        ]);
    }

    public function createJenjangSMA()
    {
        return view('admin.jenjang.SMA.create', [
            'navTitle' => 'Create Soal Jenjang SMA'
        ]);
    }

    public function storeJenjangSMA(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d,e',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('question_sma_img', 'public');
                $validated['image'] = $path;
            }

            Questions::create($validated);
            DB::commit();
            Alert::success('success', 'Soal berhasil ditambahkan.');
            return redirect()->route('admin.dashboard.jenjang.sma.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error adding soal', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            Alert::error('error', 'Terjadi kesalahan saat menambahkan soal.');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan soal.');
        }
    }

    public function updateJenjangSMA(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'question_text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'option_e' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d,e',
        ]);

        DB::beginTransaction();

        try {
            $question = Questions::findOrFail($id);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($question->image && Storage::disk('public')->exists($question->image)) {
                    Storage::disk('public')->delete($question->image);
                }

                // Store new image
                $path = $request->file('image')->store('question_sma_img', 'public');
                $validated['image'] = $path;
            } else {
                // Keep the existing image if no new image is uploaded
                unset($validated['image']);
            }

            $question->update($validated);
            Log::info('Question updated successfully', [
                'id' => $id,
                'user_id' => auth()->id(),
                'data' => $validated
            ]);

            DB::commit();
            Alert::success('success', 'Soal berhasil diupdate.');
            return redirect()->route('admin.dashboard.jenjang.sma.index');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to update question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString() // Added stack trace for better debugging
            ]);
            Alert::error('error', 'Terjadi kesalahan saat mengupdate soal.');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate soal.');
        }
    }

    public function deleteJenjangSMA(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $questions = Questions::find($id);

            $questionData = [
                'id' => $questions->id,
                'title' => $questions->title ?? 'N/A',
                'had_image' => !empty($questions->image)
            ];

            if ($questions->image && Storage::exists($questions->image)) {
                Storage::delete($questions->image);
            }

            $questions->delete();

            DB::commit();

            Alert::success('success', 'Soal berhasil dihapus.');
            return redirect()->route('admin.dashboard.jenjang.sma.index');

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Failed to delete question', [
                'id' => $id,
                'user_id' => auth()->id(),
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'timestamp' => now()
            ]);

            Alert::error('error', 'Gagal menghapus soal.');
            return back()->with('error', 'Gagal menghapus soal: ' . $e->getMessage());
        }
    }

    public function showJenjangSMA(string $id)
    {
        $questions = Questions::with('category')->where('id', $id)->first();
        return view('admin.jenjang.SMA.show', [
            'navTitle' => 'Detail Soal Jenjang SMA',
            'questionA' => $questions
        ]);
    }
}
