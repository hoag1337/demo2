<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login');
        //
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/admin');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        $valid = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required']


            ]
        );
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            // dd($request);
        ]);
        $credentials['role'] = 0;
        $credentials['status'] = 1;
        // dd($credentials);
        $remember = $request->remember ? True : False;
        if(Auth::attempt($credentials,$remember))
        {
            $request->session()->regenerate();
            return redirect()->intended((route('admin.dashboard')));
        }
        return back() -> withErrors([
            'Error' => "failed!!",]
        )-> onlyInput('email');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}