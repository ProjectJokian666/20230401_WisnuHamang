<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index(Request $request)
    {   
        // dd($request);
        $data = User::where('email', $request->email)->first();
        if($data == null){
            Alert::warning('Email Anda Salah !!!');
            return redirect('/login');
        }
        if ($data) {
            // dd($data,Hash::check($request->password,$data->password),$data->password,$request->password,Hash::make($request->password),Auth::attempt($request->only('email', 'password')));
            if (Hash::check($request->password,$data->password)) {
                Auth::attempt($request->only('email', 'password'));
                if(auth()->user()->level != "99"){
                    Alert::success('Berhasil Login', 'Selamat Datang Di Aplikasi E-Notaris ^_^');
                    return redirect('/menu');
                }
                Alert::success('Berhasil Login', 'Selamat Datang Admin ^_^');
                return redirect('/home');
            } else {
                Alert::warning('Password Anda Salah !!!');
                return redirect('/login');
            }
            Alert::warning('Harap Melakukan Login Ulang');
            return redirect('/login');
        }
        Alert::warning('Harap Melakukan Login Ulang');
        return redirect('/login');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
