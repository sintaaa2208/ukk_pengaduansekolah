<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Untuk mencatat jika ada error

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

  public function login(Request $request) {
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    // Tambahkan ->withInput() agar username tidak hilang saat gagal
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ])->withInput($request->only('username')); 
}

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'nis'      => 'required|numeric|unique:users,nis',
            'password' => 'required|min:5|confirmed', // Tambahkan confirmed jika ada input password_confirmation
        ]);

        try {
            User::create([
                'username' => $request->username,
                'nis'      => $request->nis,
                'password' => Hash::make($request->password),
                'role'     => 'siswa', 
            ]);

            return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat pendaftaran.']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}