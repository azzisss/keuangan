<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Akses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('akun.index', [
            "title"     => "Mengelola Akun",
            "active"    => "DataAkun",
            "akun"      => User::all(),
            "akses"     => Akses::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akun.create', [
            "title"         => "Tambah Akun",
            "active"        => "DataAkun",
            "akses"         => Akses::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name"      => ['required', 'min:5', 'max:255', 'unique:users'],
            "username"  => ['required', 'min:5', 'max:255', 'unique:users'],
            "id_akses"  => ['required'],
            "password"  => ['required', 'min:5', 'max:15'],
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        session()->flash('berhasil', 'Registrasi berhasil dilakukan !!');

        return redirect('/akun');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('akun.edit', [
            "title"         => "Edit Akun",
            "active"        => "DataAkun",
            "akun"          => User::find($id),
            "akses"         => Akses::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            "name"      => 'required|min:5|max:255',
            "username"  => 'required|min:5|max:255',
            "id_akses"  => 'required',
            "password"  => 'nullable',
        ]);

        // $validateData['password'] = Hash::make($validateData['password']);
        User::where('id', $id)->update($validateData);

        return redirect('/akun')->with('update', 'Data Akun Berhasil di Update');
    }
    public function changepass(Request $request, $id)
    {
        $validatepass = $request->validate([
            "password" => ['required', 'confirmed', 'min:5']
        ]);

        $validatepass['password'] = Hash::make($validatepass['password']);
        $name = User::where('id', $id)->first();
        $name->update($validatepass);
        $namestr = str($name->id);

        return redirect('/akun/' . $namestr . '/edit')->with('changepass', 'Password berhasil diubah');
    }
    public function changepassindex($id)
    {
        return view('akun.changepassindex', [
            "title"         => "Edit Akun",
            "active"        => "akun",
            "akun"      => User::find($id),
            "akses"         => Akses::get(),
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return back()->with('hapus', 'Data Akun Berhasil di Hapus');
    }
}
