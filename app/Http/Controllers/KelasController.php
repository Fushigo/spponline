<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKelas = Kelas::with('siswa')->get();
        return view('dashboard.admin.kelas.index', compact('dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        Kelas::create($result);

        session()->flash('success', 'Data berhasil di Update');

        return redirect('/admin/dashboard/datakelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::where('id_kelas', $id)->first();
        $dataKelas = Kelas::all();
        return view("dashboard.admin.kelas.update", compact('kelas', 'dataKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dataKelas = Kelas::find($id);

        $dataKelas->update($request->all());

        session()->flash('success', 'Data berhasil di Update');

        return redirect('/admin/dashboard/datakelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::where('id_kelas', $id)->first();

        $kelas->delete();

        session()->flash('success', 'Data berhasil di hapus');

        return redirect('/admin/dashboard/datakelas');
    }
}
