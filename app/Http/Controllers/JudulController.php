<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Judul;
use App\Models\TugasAkhir;
use App\Models\TugasPendahuluan;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    public function show($slug)
    {
        $judul = Judul::where("slug", $slug)->with("jadwal")->first();
        $jadwal = Jadwal::where("id_judul", $judul->id_judul)
            ->where("id_kelompok", auth()->user()->kelompok->id_kelompok)
            ->first();
        $tugas_pendahuluan = TugasPendahuluan::where("id_judul", $judul->id_judul)->first();
        $tugas_akhir = TugasAkhir::where("id_judul", $judul->id_judul)->first();

        $tanggalMulai = \Carbon\Carbon::parse($jadwal->tanggal_waktu);
        $today = \Carbon\Carbon::today();
        $hMinus3 = $tanggalMulai->copy()->subDays(3);

        $userKelompokId = auth()->user()->kelompok->id_kelompok ?? null;
        $isUserInKelompok = $jadwal->kelompok->id_kelompok === $userKelompokId;
        $isAccessible = $isUserInKelompok && $today->greaterThanOrEqualTo($hMinus3);

        if (!$isAccessible) return redirect()->route("praktikum.index");

        return view("judul.show", compact("judul", "tugas_pendahuluan", "tugas_akhir"));
    }
}
