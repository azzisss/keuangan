<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aruskas;
use Illuminate\Http\Request;

class AruskasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aruskas.index', [
            'title'     => 'Arus Kas',
            'active'    => 'ArusKas',
            'aruskas'   => Aruskas::latest()->filter(request(['search', 'name']))->get(),
            'admin'     => User::this(),
            'totalkas'  => Aruskas::totalkas()
        ]);
    }

    /**
     * menampilkan halaman aruskas baru.
     */
    public function aruskasbaru()
    {
        return view('aruskas.aruskasbaru', [
            'title'     => 'Arus Kas Baru',
            'active'    => 'ArusKas',
            'baru'      => Aruskas::lastarus(),
            'admin'     => User::this(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aruskas.create', [
            'title'     => 'Arus Kas',
            'active'    => 'ArusKas',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'pemasukan'             => ['required', 'integer'],
            'detail_pemasukan'      => ['nullable'],
            'pengeluaran'           => ['required', 'integer'],
            'detail_pengeluaran'    => ['nullable'],
            'jumlah_total'          => 'integer|required',
        ]);
        //ambil id user yang sedang aktif
        $validasidata['id_user']    =   auth()->id();

        Aruskas::create($validasidata);

        return redirect('/aruskasbaru')->with('berhasil', 'Aruskas Baru Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aruskas $aruska)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aruskas $aruska)
    {
        return view('aruskas.edit', [
            "aruskas"       => $aruska,
            "title"         => "Edit Arus Kas",
            "active"        => "ArusKas",

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aruskas $aruska)
    {
        $rules = [
            'pemasukan'             => 'required|integer',
            'detail_pemasukan'      => 'nullable',
            'pengeluaran'           => 'required|integer',
            'detail_pengeluaran'    => 'nullable',
            'jumlah_total'          => 'integer|required',
        ];

        $validatedData = $request->validate($rules);

        Aruskas::where('id', $aruska->id)->update($validatedData);

        return redirect('/aruskas')->with('update', 'Data Arus Kas Berhasil di Update');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aruskas $aruska)
    {
        Aruskas::destroy($aruska->id);
        return redirect('/aruskas')->with('hapus', 'Data Arus Kas Berhasil di Hapus');
    }

    /**
     * Laporan arus kas
     */
    public function laporan(Request $request)
    {
        // searching by time in laporan arus kas
        $aruskas = Aruskas::get();
        if ($request->get('awal') && $request->get('akhir')) {
            $awal = $request->get('awal');
            $akhir = $request->get('akhir');
            $aruskas = Aruskas::whereBetween('created_at', [$awal, $akhir])->get();
        }
        if ($request->get('awal') && $request->get('akhir') == null) {
            $awal = $request->get('awal');
            $aruskas = Aruskas::whereDate('created_at', $awal)->get();
        }
        if ($request->get('awal') == null && $request->get('akhir')) {
            $akhir = $request->get('akhir');
            $aruskas = Aruskas::whereDate('created_at', $akhir)->get();
        }
        return view('aruskas.laporan', [
            'title'     =>  'Laporan Arus kas',
            'active'    =>  'LaporanArusKas',
            'laporan'   =>  $aruskas,
            'admin'     =>  User::this(),
        ]);
    }
}
