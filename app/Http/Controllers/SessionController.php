<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi/index');
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email required',
            'password.required' => 'Password required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // otentikasi sukses
            return redirect('/karyawan/create')->with('success', 'Login Successfully!');
        } else {
            //otentikasi gagal
            //return 'Failed';
            return redirect('sesi')->withErrors('Incorrect email and password');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('sesi')->with('success', 'Logout Successfully!');
    }

    public function register()
    {
        return view('sesi/register');
    }

    public function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'email.email' => 'Please enter a valid email',
            'email.unique' => 'Email is already in use, please enter another email',
            'password.required' => 'Password required',
            'password.min' => 'Password minimum 6 characters',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // otentikasi sukses
            return redirect('/karyawan/create')->with('success', Auth::user()->name.'Register Successfully!');
        } else {
            //otentikasi gagal
            //return 'Failed';
            return redirect('sesi')->withErrors('Incorrect email and password');
        }
    }
}
