<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Http\Requests\StudentRequest;
use RealRashid\SweetAlert\Facades\Alert;

class userController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('id', '!=', Auth::id());

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('asal_sekolah', 'like', '%' . $request->keyword . '%')
                    ->orWhere('jenis_kelamin', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->filled('jenjang')) {
            $query->where('jenjang_pendidikan', $request->jenjang);
        }
        $users = $query->get();

        return view('admin.users.index', [
            'navTitle' => 'User Management',
            'users' => $users,
        ]);
    }

    public function create()
    {
        $provinces = Province::all();
        return view('admin.users.create', [
            'navTitle' => 'Create Student Account',
            'provinces' => $provinces,
        ]);
    }

    public function store(StudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validated();

            $validatedData['token'] = 'HRP_' . Str::random(10);
            $validatedData['password'] = User::generatePassword();
            $validatedData['email'] = 'student@' . Str::random(8) . '.edu.id';

            $students = User::create($validatedData);

            $students->assignRole($validatedData['jenjang_pendidikan']);

            DB::commit(); 
            Alert::success('Student account created successfully.')->flash();
            return redirect()->route('admin.users.index')->with('success', 'User  created successfully.');
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error creating student account: ' . $e->getMessage());
            Alert::error('Failed to create user: ' . $e->getMessage())->flash();
            return redirect()->route('admin.users.index')->with('error', 'Failed to create user. Please try again.');
        }
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.users.show', [
            'user' => $user,
            'navTitle' => 'User Detail',
        ]);
    }

    public function delete(string $id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
            Alert::success('User deleted successfully.')->flash();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Failed to delete user: ' . $e->getMessage())->flash();
            Log::error('Failed to delete user: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to delete user: ' . $e->getMessage()]);
        }
    }
}
