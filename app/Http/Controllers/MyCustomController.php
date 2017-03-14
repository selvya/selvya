<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class MyCustomController extends Controller
{

    public function username()
    {
        return 'username';
    }
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            return redirect()->intended('home');
            // dd($request->session()->all());
        }

        return redirect()->back()->withInput();
    }
}