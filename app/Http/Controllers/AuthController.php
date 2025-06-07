<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{


    public function adminlogin()
    {
        return view('auth.loginPage');
    }

    public function adminLoginProcess(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke dashboard admin setelah login berhasil
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Login berhasil! Selamat datang kembali.');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan tidak sesuai.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginStudents()
    {
        return view('auth.studentLoginPage');
    }

    public function loginStudentsProcess(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required'
        ]);
        $user = User::where('token', $validated['token'])->first();
        if (!$user) {
            Alert::error('error', 'user tidak ditemukan, token salah');
            return redirect()->back();
        }
        Auth::login($user);
        Alert::success('success', 'Berhasil Login!');
        return redirect()->route('students.jenjang.index');
    }
}
