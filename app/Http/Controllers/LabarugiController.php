<?php

namespace App\Http\Controllers;

use App\Models\Labarugi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LabarugiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('month')) {
            $waktu = date($request->get('month'));
        } else {
            $waktu = date('Y-m');
            $m = date('m', strtotime($waktu));
            $y = date('Y', strtotime($waktu));
        }
        $m = date('m', strtotime($waktu));
        $y = date('Y', strtotime($waktu));


        //ambil data labarugi dari database
        $pendapatan_kas         = Labarugi::whereMonth('time', $m)->whereYear('time', $y)->get()->sum('pendapatan_kas');
        $pendapatan_penjualan   = Labarugi::whereMonth('time', $m)->whereYear('time', $y)->get()->sum('pendapatan_penjualan');
        $pendapatan_lain        = Labarugi::whereMonth('time', $m)->whereYear('time', $y)->get()->sum('pendapatan_lain');
        $gaji_pegawai           = Labarugi::whereMonth('time', $m)->whereYear('time', $y)->get()->sum('gaji_pegawai');
        $laba_rugi              = Labarugi::whereMonth('time', $m)->whereYear('time', $y)->get()->sum('laba_rugi');
        return view('labarugi.index', [
            "title"                 => 'Laba Rugi',
            "active"                => 'LabaRugi',
            "waktu"                 => $m . ' ' . $y,
            "pendapatan_kas"        => $pendapatan_kas,
            "pendapatan_penjualan"  => $pendapatan_penjualan,
            "pendapatan_lain"       => $pendapatan_lain,
            "gaji_pegawai"          => $gaji_pegawai,
            "laba_rugi"             => $laba_rugi
        ]);
    }
}
