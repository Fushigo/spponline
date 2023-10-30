<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;

class AdminController extends Controller
{
    public function index()
    {
        $dataAdmin = Petugas::where('level', 'admin')->get();
        return view('dashboard.admin.dataAdmin.index', [
            'dataAdmin' => $dataAdmin,
        ]);
    }

    public function create()
    {
        $levelPetugas = Petugas::all();
        return view('dashboard.admin.dataAdmin.create', compact('levelPetugas'));
    }

    public function store(StorePetugasRequest $request)
    {
        $resultPetugas = $request->validate([
            'level' => 'required',
            'nama_petugas' => 'required',
            'password' => 'required',
            'username' => 'required'
        ]);

        Petugas::create($resultPetugas);
        return redirect('/admin/dashboard/dataadmin');
    }

    public function edit($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->first();
        $levelPetugas = Petugas::all();
        return view('dashboard.admin.dataAdmin.update', compact('petugas', 'levelPetugas'));
    }

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

        return redirect('/admin/dashboard/dataadmin');
    }

    public function destroy($id)
    {
        $petugas = Petugas::where('id_petugas', $id)->first();
        $petugas->delete();
        return redirect('/admin/dashboard/dataadmin');
    }
}
