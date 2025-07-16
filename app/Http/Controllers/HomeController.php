<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Praktikum;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $daftar_galeri = Galeri::all();
        $daftar_prestasi = Prestasi::all();
        $daftar_praktikum = Praktikum::with("galeri")->get();
        return view("home", compact("daftar_galeri", "daftar_praktikum", "daftar_prestasi"));
    }
}
