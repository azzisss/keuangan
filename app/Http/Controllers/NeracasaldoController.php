<?php

namespace App\Http\Controllers;

use App\Models\Aruskas;
use App\Models\Labarugi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NeracasaldoController extends Controller
{
    public function index(Request $request)
    {

        if ($request->get('nsmonth')) {
            $waktu = date($request->get('nsmonth'));
        } else {
            $waktu = date('Y-m');
        }
        $m = date('m', strtotime($waktu));
        $y = date('Y', strtotime($waktu));

        return view('neracasaldo.index', [
            "title"     => 'Neraca Saldo',
            "active"    => 'NeracaSaldo',
            "time"      => $waktu,
            "kas"       => Aruskas::whereMonth('created_at', $m)->whereYear('created_at', $y)->get()->sum('jumlah_total')
        ]);
    }

    // submit neraca saldo ke laba rugi
    public function submit(Request $request)
    {
        $validasidata = $request->validate([
            'pendapatan_kas'        => 'required|integer',
            'pendapatan_penjualan'  => 'required|integer',
            'pendapatan_lain'       => 'required|integer',
            'gaji_pegawai'          => 'required|integer',
            'time'                  => 'required|date'
        ]);
        $validasidata['laba_rugi']  = request('pendapatan_kas') + request('pendapatan_penjualan') + request('pendapatan_lain') - request('gaji_pegawai');

        //check apakah data sudah ada bila sudah ada maka replace/update data berdasarkan waktu
        $check = Labarugi::where('time', $request->input('time'))->first();
        $validasidata['time'] = Carbon::createFromFormat('Y-m', $request->time);
        // dd($request->input('time'));
        if ($check) {
            Labarugi::where('time', $request->input('time'))->update($validasidata);
            return redirect('/neracasaldo')->with('update', 'Data Neraca saldo Berhasil di Update');
        } else {
            Labarugi::create($validasidata);
            return redirect('/neracasaldo')->with('berhasil', 'Data Neraca saldo Berhasil di Tambah');
        }
    }
}
