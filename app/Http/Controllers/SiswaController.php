<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\Spp;

class SiswaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSiswa = Siswa::all();
        return view('dashboard.admin.siswa.index', [
            'dataSiswa' => $dataSiswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dataKelas = Kelas::all();
        return view('dashboard.admin.siswa.create', compact('dataKelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $result = $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_kelas' => 'required',
            "id_spp" => 'required'
        ]);

        Siswa::create($result);
        session()->flash('success', 'Data berhasil di tambahkan');
        return redirect('/admin/dashboard/datasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->first();
        $dataKelas = Kelas::all();
        $dataSpp = Spp::all();
        return view("dashboard.admin.siswa.update", compact('siswa', 'dataKelas', 'dataSpp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, $id)
    {
        $update = $request->validate([
            "nisn" => 'required',
            "nis" => "required",
            "nama" => "required",
            "alamat" => "required",
            "no_telp" => "required",
            "id_kelas" => "required",
            "id_spp" => "required"
        ]);


        // $siswa->update($request->all());
        $siswa = Siswa::where('id_siswa', $id)->first();
        $siswa->update($update);
        session()->flash('success', 'Data berhasil di update');
        return redirect('/admin/dashboard/datasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::where('id_siswa', $id)->first();
        $siswa->delete();
        session()->flash('success', 'Data berhasil di hapus');
        return redirect('/admin/dashboard/datasiswa');
    }
}
