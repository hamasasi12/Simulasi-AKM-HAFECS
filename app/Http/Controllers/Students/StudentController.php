<?php

namespace App\Http\Controllers\Students;

use App\Models\User;
use App\Models\Students;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'asal_sekolah' => 'required|string|max:255',
            'jenjang_pendidikan' => 'required',
            'provinsi' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'jenis_kelamin' => 'required',
        ]);

        $validatedData['token'] = 'HRP_' . Str::random(10);
        $validatedData['password'] = User::generatePassword();
        $validatedData['email'] = 'student@' . Str::random(8) . '.edu.id';
        $validatedData['name'] = $validatedData['nama_siswa'];

        $students = User::create($validatedData);
        Auth::login($students);
        $students->assignRole($validatedData['jenjang_pendidikan']);

        return redirect()->route('students.jenjang.index');
    }

    public function index() {
        return view('students.index');
    }
}
