<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index()
    {
        return view("Auth.register");
    }

    public function store(Request $request)
    {
        $result = $request->validate([
            "nisn" => "required|unique:siswas|max:10|min:10",
            "nama" => "required",
            "alamat" => "required",
            "no_telp" => "required|min:10",
        ]);

        Siswa::create($result);
        return redirect("/");
    }
}
