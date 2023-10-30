<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Http\Requests\StoreSppRequest;
use App\Http\Requests\UpdateSppRequest;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSpp = Spp::all();
        return view('dashboard.admin.dataSpp.index', [
            'dataSpp' => $dataSpp,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.dataSpp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSppRequest $request)
    {
        $dataSpp = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        Spp::create($dataSpp);
        return  redirect('admin/dashboard/dataspp');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spp = Spp::where('id_spp', $id)->first();
        return view('dashboard.admin.dataSpp.update', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSppRequest $request, $id)
    {
        $updateSpp = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        $spp = Spp::where('id_spp', $id)->first();
        $spp->update($updateSpp);

        return redirect('admin/dashboard/dataspp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::where('id_spp', $id)->first();
        $spp->delete();

        return redirect('admin/dashboard/dataspp');
    }

    public function getIdSpp($id){
        $idSpp = Spp::where('id_spp', $id)->get();
        return response()->json($idSpp);
    }
}
