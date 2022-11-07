<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerUser extends Controller
{

    //Admin View
    public function index()
    {
        $user = User::where('role', 'User')->simplePaginate(8);
        return view('dashboard.customerUser', ['user' => $user]);
    }

    public function cariCustomer(Request $request)
    {
        $cari = $request->cari;

        $user = DB::table('users')->where('nama', 'like', "%" . $cari . "%")->simplePaginate();

        return view('dashboard.customerUser', ['user' => $user]);
    }

    public function hapus($id)
    {
        $data = User::find($id);
        if (isset($data)) {
            $data->delete();
            return back()->with('pesan', 'Data deleted successfully!');
        }
        return back()->with('pesangagal', 'Failed to delete');
    }

    public function editview($id)
    {
        $cek = User::select('*')->where('id', $id)->first();
        if (isset($cek)) {
            return view('dashboard.posts.editUser', ['data' => $cek]);
        } else {
            return back()->with('pesangagal', 'Failed to Edit Form!');
        }
    }

    public function edit(Request $request)
    {
        $datauser = User::find($request->id);

        if (isset($datauser)) {
            $datauser->nama = $request->nama;
            $datauser->email = $request->email;
            $datauser->username = $request->username;
            $datauser->notelp = $request->notelp;
            $datauser->tgl_lahir = $request->tgllahir;
            $datauser->alamat = $request->alamat;
            $datauser->role = $request->role;
            $datauser->save();

            return redirect('/customerUser')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/customerUser')->with('pesangagal', 'Failed to Edit');
        }
    }

    //Users View
    public function userIndex()
    {
        return view('user.profile');
    }

    public function viewUser()
    {
        return view('user.editprofile');
    }

    public function editProfil(Request $request)
    {
        $datauser = User::find($request->id);

        if (isset($datauser)) {
            $datauser->nama = $request->nama;
            $datauser->email = $request->email;
            $datauser->username = $request->username;
            $datauser->notelp = $request->notelp;
            $datauser->tgl_lahir = $request->tgllahir;
            $datauser->alamat = $request->alamat;
            $datauser->save();

            return redirect('/profilUser')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/profilUser')->with('pesangagal', 'Failed to Edit');
        }
    }

    public function editProfilAdmin(Request $request)
    {
        $datauser = User::find($request->id);

        if (isset($datauser)) {
            $datauser->nama = $request->nama;
            $datauser->email = $request->email;
            $datauser->username = $request->username;
            $datauser->notelp = $request->notelp;
            $datauser->tgl_lahir = $request->tgllahir;
            $datauser->alamat = $request->alamat;
            $datauser->save();

            return redirect('/profil')->with('pesan', 'Edit Successfully!');
        } else {
            return redirect('/profil')->with('pesangagal', 'Failed to Edit');
        }
    }
}
