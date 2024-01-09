<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function sertifikat()
    {
        return view('admin.sertifikat');
    }
    public function pelatihan()
    {
        return view('admin.pelatihan');
    }
    public function pelatihan_tambah()
    {
        return view('admin.tambahPelatihan');
    }
}
