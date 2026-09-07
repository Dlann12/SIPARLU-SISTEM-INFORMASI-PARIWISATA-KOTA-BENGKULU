<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'

        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        
        $infologin = [
            'email' =>$request->email,
            'password' =>$request->password,
        ];
        
        if( Auth::attempt($infologin)) {
           if(Auth::user()->role == 'admin'){
            return redirect('/admin');

           }elseif (Auth::user()->role == 'user'){
            return redirect('/user');

            }

        }else{
            return redirect('')->withErrors('Username dan Password yang Dimasukkan Salah atau Tidak Sesuai')->withInput();
        }
        
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
