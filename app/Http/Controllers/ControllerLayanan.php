<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ControllerLayanan extends Controller
{
    public function index()
    {
        $layanan = DB::table('layanan')->simplePaginate(7);
        return view('dashboard.layanan', ['layanan' => $layanan]);
    }

    public function cariLayanan(Request $request)
    {
        $cari = $request->cari;

        $layanan = DB::table('layanan')->where('nama_lyn', 'like', "%" . $cari . "%")->simplePaginate();

        return view('dashboard.layanan', ['layanan' => $layanan]);
    }

    public function input()
    {
        return view('dashboard.posts.inputLayanan');
    }

    public function store(Request $request)
    {

        $request->validate([
            'namalyn' => 'required',
            'imagelyn' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hargalyn' => 'required'
        ]);

        if ($request->file('imagelyn')) {
            $gambar = $request->file('imagelyn')->store('layanan-images');
        }

        Layanan::create([
            'nama_lyn' => $request->namalyn,
            'image_lyn' => $gambar,
            'harga_lyn' => $request->hargalyn
        ]);

        return redirect('/layanan')->with('pesan', 'Added Successfully!');
    }

    public function viewlyn($id)
    {
        $cek = Layanan::select('*')->where('id', $id)->first();
        if (isset($cek)) {
            return view('dashboard.posts.editlayanan', [
                'data' => $cek,
            ]);
        } else {
            return back()->with('pesangagal', 'Failed to Edit Form!');
        }
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'namalyn' => 'required',
            'imagelyn' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hargalyn' => 'required'
        ]);

        $data = Layanan::find($id);

        if (isset($data)) {
            if ($request->file('imagelyn')) {
                if ($data->image_lyn) {
                    Storage::delete($data->image_lyn);
                }
                $gambar = $request->file('imagelyn')->store('layanan-images');
            }
            $data->nama_lyn = $request->namalyn;
            $data->image_lyn = $gambar;
            $data->harga_lyn = $request->hargalyn;
            $data->save();

            return redirect('/layanan')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/layanan')->with('pesangagal', 'Failed to Edit!');
        }
    }

    public function hapus($id)
    {
        $data = Layanan::find($id);
        if (isset($data)) {
            if ($data->image_lyn) {
                Storage::delete($data->image_lyn);
            }
            $data->delete();
            return back()->with('pesan', 'Data deleted successfully!');
        }
        return back()->with('pesangagal', 'Failed to delete');
    }
}
