<?php

namespace App\Http\Controllers;

use App\Models\KebutuhanPraktikum;
use Illuminate\Http\Request;

class PraPraktikumController extends Controller
{
    public function index()
    {
        $kebutuhan_praktikum = KebutuhanPraktikum::first();
        return view("pra-praktikum", compact("kebutuhan_praktikum"));
    }
}
