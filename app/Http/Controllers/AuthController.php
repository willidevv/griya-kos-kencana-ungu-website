<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin() {
        return view('auth.login');
    }

    /**
     * Proses Autentikasi
     */
    public function login(Request $request) {
        // 1. Validasi Input sesuai limit Database (VARCHAR 30 & 60) - TETAP SAMA
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:30'],
            'password' => ['required', 'max:60'],
        ], [
            'email.max' => 'Email tidak boleh lebih dari 30 karakter.',
            'password.max' => 'Kata sandi tidak boleh lebih dari 60 karakter.',
        ]);

        // 2. Ambil status checkbox "Remember Me" - TETAP SAMA
        $remember = $request->has('remember');

        // 3. Coba login
        if (Auth::attempt($credentials, $remember)) {
            
            // Ambil data user yang mencoba login
            $user = Auth::user();

            // 4. Cek apakah status user Aktif (is_active)
            if ($user->is_active) {
                $request->session()->regenerate();
                
                // PERBAIKAN DI SINI: Diarahkan menggunakan route name 'admin.dashboard' 
                // agar sinkron dengan file web.php Anda dan menghindari 403/404.
                return redirect()->intended(route('admin.dashboard'))
                                 ->with('success', 'Selamat datang kembali!');
            }

            // 5. Jika user TIDAK AKTIF, paksa logout kembali - TETAP SAMA
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'Akun Anda telah dinonaktifkan oleh Super Admin.',
            ])->onlyInput('email');
        }

        // 6. Jika kredensial (Email/Password) salah - TETAP SAMA
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Proses Logout
     */
    public function logout(Request $request) {
        Auth::logout();

        // Bersihkan session - TETAP SAMA
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan ke login dengan pesan sukses
        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}