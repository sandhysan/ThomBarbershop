<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ControllerAdminUser extends Controller
{
    public function index()
    {
        $user = User::where('role', 'Admin')->simplePaginate(8);
        return view('dashboard.adminUser', ['user' => $user]);
    }

    public function cariAdmin(Request $request)
    {
        $cari = $request->cari;

        $user = DB::table('users')->where('nama', 'like', "%" . $cari . "%")->simplePaginate();

        return view('dashboard.adminUser', ['user' => $user]);
    }

    public function forminput()
    {
        return view('dashboard.posts.inputAdminUser');
    }


    public function store(Request $request)
    {

        if ($request->password == $request->konfirmasi) {

            $request->validate([
                'nama'          => 'required',
                'email'         => 'required | unique:users',
                'username'      => 'required | unique:users',
                'notelp'        => 'required',
                'tgllahir'      => 'required',
                'alamat'        => 'required | min:5'
            ]);

            $pass = Hash::make($request->password);
            $role = 'Admin';

            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $pass,
                'notelp' => $request->notelp,
                'tgl_lahir' => $request->tgllahir,
                'alamat' => $request->alamat,
                'role' => $role
            ]);

            return redirect('/adminUser')->with('pesan', 'Added Successfully!');
        } else {
            return view('/inputAdminUser')->with('pesan', 'Failed');
        }
    }

    public function hapus($id)
    {
        $data = User::find($id);
        if (isset($data)) {
            $data->delete();
            return back()->with('pesan', 'Data deleted successfully!');
        }
        return back()->with('pesan', 'Failed to delete');
    }

    public function editview($id)
    {
        $cek = User::select('*')->where('id', $id)->first();
        if (isset($cek)) {
            return view('dashboard.posts.editAdminUser', ['data' => $cek]);
        } else {
            return back()->with('pesan', 'Failed to Edit Form!');
        }
    }

    public function edit(Request $request)
    {
        $datauser = User::find($request->id);

        if (isset($datauser)) {
            $datauser->nama = $request->nama;
            $datauser->email = $request->email;
            $datauser->username = $request->username;
            $datauser->password = $request->password;
            $datauser->notelp = $request->notelp;
            $datauser->tgl_lahir = $request->tgllahir;
            $datauser->alamat = $request->alamat;
            $datauser->role = $request->role;
            $datauser->save();

            return redirect('/adminUser')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/adminUser')->with('pesangagal', 'Failed to Edit!');
        }
    }

    public function viewprofil()
    {
        return view('dashboard.posts.editprofile');
    }

    public function editprofil(Request $request)
    {
        $datauser = User::find($request->id);

        if (isset($datauser)) {
            $datauser->nama = $request->nama;
            $datauser->email = $request->email;
            $datauser->username = $request->username;
            $datauser->password = $request->password;
            $datauser->notelp = $request->notelp;
            $datauser->tgl_lahir = $request->tgllahir;
            $datauser->alamat = $request->alamat;
            $datauser->role = $request->role;
            $datauser->save();

            return redirect('/dashboard')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/dashboard')->with('pesangagal', 'Failed to Edit!');
        }
    }

    public function profiladmin()
    {
        return view('dashboard.profileAdmin');
    }
}
