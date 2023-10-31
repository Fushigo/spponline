<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dataKelas = Kelas::all();
        $dataSiswa = Siswa::all();
        $dataSPP   = Spp::all();
        return view('dashboard.admin.index', compact('dataSiswa', 'dataKelas', 'dataSPP'));
    }

    public function siswaIndex()
    {
        if (!Auth::guard('siswa')->user()) {
            return redirect('/siswa/login');
        } else {

            $dataKelas = Kelas::where('id_kelas', Auth::guard('siswa')->user()->id_kelas)->get();
            $dataSiswa = Siswa::where('id_siswa', Auth::guard('siswa')->user()->id_siswa)->get();
            $dataPembayaran = Pembayaran::where('id_siswa', Auth::guard('siswa')->user()->id_siswa)->where('status', 'Unpaid')->get();
            $dataHistory = Pembayaran::where('id_siswa', Auth::guard('siswa')->user()->id_siswa)->where('status', 'Paid')->get();

            return view('dashboard.siswa.index', compact('dataKelas', 'dataSiswa', 'dataPembayaran', 'dataHistory'));
        }
    }

    public function petugasIndex()
    {

        return view('dashboard.petugas.index');
    }
}
