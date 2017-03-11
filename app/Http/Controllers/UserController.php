<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\User;
use Hash;
use App\Departemen;
use App\Direktorat;
use App\Satker;
use App\Komisioner;

class UserController extends Controller
{
    public function user(UserDataTable $dataTable)
    {
        return $dataTable->render('user.user');
    }
    public function usertambahview()
    {
        $departemen = Departemen::all();
        $kojk = Direktorat::all();
        $satker = Satker::all();
        $komisioner = Komisioner::all();

        return view('user.tambah-user', compact('departemen', 'kojk', 'satker','komisioner'));
    }

    public function tambahuser(Request $r)
    {

        $user = new User;
        $user->username = $r->username;
        $user->email = 'kosong';
        $user->password = Hash::make($r->password);
        $user->otoritas = $r->otoritas;
        $user->deputi_kom = $r->deputi;
        $user->departemen = $r->departemen;
        $user->direktorat_id = $r->kojk;
        $user->kojk = $r->kojk;
        $user->change_partner = $r->change;
        $user->satker = $r->satker;
        $user->jabatan = $r->jabatan;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil ditambahkan');

    }
    public function hapususer($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');        
    }
    public function editview($id)
    {
        $departemen = Departemen::all();
        $kojk = Direktorat::all();
        $satker = Satker::all();
        $komisioner = Komisioner::all();
        $user = User::findOrFail($id);

        return view('user.edit-user', compact('departemen', 'kojk', 'satker','user','komisioner'));
    }
    public function edit(Request $r, $id)
    {

        $user = User::findOrFail($id);
        $user->username = $r->username;
        $user->email = 'kosong';
        if (!empty($r->password)) {
            $user->password = Hash::make($r->password);
        }
        $user->otoritas = $r->otoritas;
        $user->deputi_kom = $r->deputi;
        $user->departemen = $r->departemen;
        $user->direktorat_id = $r->kojk;
        $user->kojk = $r->kojk;
        $user->change_partner = $r->change;
        $user->satker = $r->satker;
        $user->jabatan = $r->jabatan;
        $user->save();
        // dd($user);

        return redirect()->back()->with('success', 'User berhasil diubah');

    }
}
