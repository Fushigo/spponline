<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $result = $request->validate([
            "nisn" => "required|numeric",
            "nis" => "required|numeric",
        ]);

        // Cek apakah pengguna adalah siswa
        $siswa = Siswa::where('nisn', $result['nisn'])->where('nis', $result['nis'])->first();

        if ($siswa) {
            Auth::guard('siswa')->login($siswa);
            $request->session()->regenerate();
            return redirect()->intended("/siswa/dashboard");
        }

        return back()->with('loginError', 'Login gagal. Pastikan nisn dan nama Anda benar.');
    }

    public function loginPetugas(Request $request)
    {
        $resultPetugas = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);
    
        // Cari petugas berdasarkan username
        $petugas = Petugas::where("username", $resultPetugas["username"])->first();
    
        if (!$petugas) {
            return back()->with('loginError', 'Username tidak ditemukan.');
        }
    
        // Cobalah untuk melakukan otentikasi dengan guard 'petugas'
        if (Auth::guard('petugas')->attempt($resultPetugas)) {
            $request->session()->regenerate();
    
            // Cetak semua data sesi, termasuk data pengguna yang baru saja login
            // dd($request->session()->all());
    
            if ($petugas && $petugas->level == 'admin') {
                return redirect()->intended("/admin/dashboard");
            } elseif ($petugas) {
                return redirect()->intended("/petugas/dashboard");
            }
        }
    
        return back()->with('loginError', 'Login gagal. Pastikan username dan password Anda benar.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
