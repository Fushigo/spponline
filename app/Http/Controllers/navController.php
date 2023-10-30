<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navController extends Controller
{
    public function Home()
    {
        return view("home.index");
    }

    public function siswaLogin()
    {
        return view("Auth.siswaLogin");
    }

    public function petugasLogin()
    {
        return view("Auth.petugasLogin");
    }

    // public function siswa()
    // {
    //     return view("dashboard.siswa.index");
    // }

    // public function petugas()
    // {
    //     return view("dashboard.petugas.index");
    // }

    // public function admin()
    // {
    //     return view("dashboard.admin.index");
    // }

    // public function dataSiswa()
    // {
    //     return view("dashboard.admin.siswa.index");
    // }
}
