<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPetugas = Petugas::where('level', 'petugas')->get();
        return view('dashboard.admin.petugas.index', [
            'dataPetugas' => $dataPetugas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levelPetugas = Petugas::all();
        return view('dashboard.admin.petugas.create', compact('levelPetugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetugasRequest $request)
    {
        $resultPetugas = $request->validate([
            'level' => 'required',
            'nama_petugas' => 'required',
            'password' => 'required',
            'username' => 'required'
        ]);

        Petugas::create($resultPetugas);
        session()->flash('success', 'Data berhasil di tambahkan');
        return redirect('/admin/dashboard/datapetugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->first();
        $levelPetugas = Petugas::all();
        return view('dashboard.admin.petugas.update', compact('petugas', 'levelPetugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetugasRequest $request, $id)
    {
        $resultPetugas = $request->validate([
            'level' => 'required',
            'nama_petugas' => 'required',
            'password' => 'required',
            'username' => 'required'
        ]);
        $petugas = Petugas::where('id_petugas', $id)->first();
        $petugas->update($resultPetugas);
        session()->flash('success', 'Data berhasil di update');
        return redirect('/admin/dashboard/datapetugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->first();
        $petugas->delete();
        session()->flash('success', 'Data berhasil di hapus');
        return redirect('/admin/dashboard/datapetugas');
    }
}
