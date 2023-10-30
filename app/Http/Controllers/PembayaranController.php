<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dataPembayaran = Pembayaran::with('siswa', 'petugas', 'spp')->get();
        if (Auth::guard("petugas")->user()->level == 'petugas') {

            return view('dashboard.petugas.transaksi.index', compact('dataPembayaran'));
        }

        return view('dashboard.admin.transaksi.index', compact('dataPembayaran'));
    }

    public function laporan()
    {
        $dataLaporan = Pembayaran::with('siswa', 'petugas', 'spp')->get();
        return view('dashboard.admin.transaksi.generate', compact('dataLaporan'));
    }

    public function history()
    {
        $dataHistory = Pembayaran::with('siswa', 'petugas', 'spp')->get();
        if (Auth::guard("petugas")->user()->level == 'petugas') {

            return view('dashboard.petugas.transaksi.history', compact('dataHistory'));
        }

        return view('dashboard.admin.transaksi.history', compact('dataHistory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataPembayaran = Pembayaran::with('siswa', 'petugas', 'spp')->get();
        $dataSiswa = Siswa::all();
        $dataPetugas = Petugas::all();
        $dataSpp = Spp::all();
        if (Auth::guard("petugas")->user()->level == 'petugas') {

            return view('dashboard.petugas.transaksi.create', compact('dataPembayaran', 'dataSiswa', 'dataPetugas', 'dataSpp'));
        }

        return view('dashboard.admin.transaksi.create', compact('dataPembayaran', 'dataSiswa', 'dataPetugas', 'dataSpp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {

        $data = $request->validate([
            "id_siswa" => 'required',
            'id_petugas' => 'required',
            'tgl_bayar' => 'required',
            'bulan_bayar' => 'required',
            'tahun_bayar' => 'required',
            'id_spp' => 'required'
        ]);

        Pembayaran::create($data);

        session()->flash('success', 'Data berhasil di hapus');
        return redirect('/admin/dashboard/pembayaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->first();
        $pembayaran->delete();
        session()->flash('success', 'Data berhasil di hapus');
        return redirect('/admin/dashboard/pembayaran');
    }
}
