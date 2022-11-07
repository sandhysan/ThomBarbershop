<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ControllerKaryawan extends Controller
{
    public function index()
    {
        $karyawan = DB::table('karyawan')->simplePaginate(10);
        return view('dashboard.karyawanUser', ['karyawan' => $karyawan]);
    }

    public function cariKaryawan(Request $request)
    {
        $cari = $request->cari;

        $karyawan = DB::table('karyawan')->where('nama', 'like', "%" . $cari . "%")->simplePaginate();

        return view('dashboard.karyawanUser', ['karyawan' => $karyawan]);
    }

    public function inputview()
    {
        return view('dashboard.posts.inputKywnUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'notelp' => 'required',
            'tgllahir' => 'required',
            'alamat' => 'required'
        ]);

        if ($request->file('foto')) {
            $gambar = $request->file('foto')->store('karyawan-images');
        }

        Karyawan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'foto' => $gambar,
            'notelp' => $request->notelp,
            'tgl_lahir' => $request->tgllahir,
            'alamat' => $request->alamat
        ]);

        return redirect('/karyawanUser')->with('pesan', 'Added Successfully!');
    }

    public function hapus($id)
    {
        $data = Karyawan::find($id);
        if (isset($data)) {
            $data->delete();
            return back()->with('pesan', 'Data deleted successfully!');
        }
        return back()->with('pesangagal', 'Failed to delete');
    }

    public function editview($id)
    {
        $cek = Karyawan::select('*')->where('id', $id)->first();
        if (isset($cek)) {
            return view('dashboard.posts.editKywn', ['data' => $cek]);
        } else {
            return back()->with('pesangagal', 'Failed to Edit Form!');
        }
    }

    public function edit(Request $request)
    {
        $datauser = Karyawan::find($request->id);

        if (isset($datauser)) {
            if ($request->file('foto')) {
                if ($datauser->foto) {
                    Storage::delete($datauser->foto);
                }
                $gambar = $request->file('foto')->store('karyawan-images');
            }
            $datauser->nama = $request->nama;
            $datauser->email = $request->email;
            $datauser->foto = $gambar;
            $datauser->notelp = $request->notelp;
            $datauser->tgl_lahir = $request->tgllahir;
            $datauser->alamat = $request->alamat;
            $datauser->save();

            return redirect('/karyawanUser')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/karyawanUser')->with('pesangagal', 'Failed to Edit!');
        }
    }
}
