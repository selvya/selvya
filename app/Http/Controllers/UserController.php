<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\User;

class UserController extends Controller
{
    public function user(UserDataTable $dataTable)
    {
        return $dataTable->render('user.user');
    }
    public function usertambahview()
    {
        return view('user.tambah-user');
    }
    public function tambahuser(Request $r)
    {

        $user = new User;
        $user->username = $r->username;
        $user->email = 'kosong';
        $user->password = $r->password;
        $user->otoritas = $r->otoritas;
        $user->deputi_kom = $r->deputi;
        $user->departemen = $r->departemen;
        $user->kojk = $r->kojk;
        $user->change_partner = $r->change;
        $user->satker = $r->satker;
        $user->jabatan = $r->jabatan;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil ditambahkan');

    }
}
