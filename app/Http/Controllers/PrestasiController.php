<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $daftar_prestasi = Prestasi::all();
        return view("prestasi.index", compact("daftar_prestasi"));
    }

    public function show($slug)
    {
        $prestasi = Prestasi::where("slug", $slug)->first();
        return view("prestasi.show", compact("prestasi"));
    }
}
