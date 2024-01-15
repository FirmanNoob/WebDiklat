<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_proses(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu Berhasil Logout');
    }

    public function register()
    {
        return view('regis');
    }

    public function register_proses(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                // 'password' => Hash::make($request->password)
                'password' => 'required|min:5'
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah')->withInput();
        }
    }

    public function listUser()
    {
        $data = User::all();

        return view('admin.user', compact('data'));
    }
}
