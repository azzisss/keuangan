<?php

namespace App\Http\Controllers;

use App\Models\Labarugi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukubesarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('year')) {
            $waktu = date($request->get('year'));
        } else {
            $waktu = date('Y');
        }


        //ambil data labarugi dari database
        $pendapatan_kas         = Labarugi::whereYear('time', $waktu)->get()->sum('pendapatan_kas');
        $pendapatan_penjualan   = Labarugi::whereYear('time', $waktu)->get()->sum('pendapatan_penjualan');
        $pendapatan_lain        = Labarugi::whereYear('time', $waktu)->get()->sum('pendapatan_lain');
        $gaji_pegawai           = Labarugi::whereYear('time', $waktu)->get()->sum('gaji_pegawai');
        $laba_rugi              = Labarugi::whereYear('time', $waktu)->get()->sum('laba_rugi');
        return view('bukubesar.index', [
            'title'                 => 'Buku Besar',
            'active'                => 'BukuBesar',
            "waktu"                 => $waktu,
            "pendapatan_kas"        => $pendapatan_kas,
            "pendapatan_penjualan"  => $pendapatan_penjualan,
            "pendapatan_lain"       => $pendapatan_lain,
            "gaji_pegawai"          => $gaji_pegawai,
            "laba_rugi"             => $laba_rugi
        ]);
    }
}
