<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Praktikum;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $daftar_galeri = Galeri::all();
        $daftar_praktikum = Praktikum::with("galeri")->get();
        return view("gallery", compact("daftar_galeri", "daftar_praktikum"));
    }
}
