<?php

namespace App\Http\Controllers;

use App\Models\Praktikum;
use App\Models\User;
use Illuminate\Http\Request;

class PraktikumController extends Controller
{
    public function index()
    {
        $user = User::where('id_user', auth()->user()->id_user)->with("praktikum.judul.jadwal")->first();
        $user_praktikum = $user->praktikum;
        $daftar_praktikum = Praktikum::with("judul.jadwal")->get();
        return view('praktikum.index', compact('user_praktikum', 'user', 'daftar_praktikum'));
    }

    public function show($slug)
    {
        $praktikum = Praktikum::where("slug", $slug)->with('kebutuhanPraktikum')->first();
        $kebutuhan = $praktikum->kebutuhanPraktikum;
        if ($kebutuhan) {
            $kebutuhanPraktikum = [
                'lembar_asistensi' => $kebutuhan->lembar_asistensi,
                'lembar_tp' => $kebutuhan->lembar_tp,
                'format_margin' => $kebutuhan->format_margin,
                'format_laprak' => $kebutuhan->format_laprak,
                'format_absen' => $kebutuhan->format_absen,
            ];
            return view('praktikum.show', compact('praktikum', 'kebutuhanPraktikum'));
        }
        return view('praktikum.show', compact('praktikum'));
    }
}
