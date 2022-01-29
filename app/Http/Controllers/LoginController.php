<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function todashboard()
    {
       
        if(auth()->user()->role == 'superadmin')
        {
            return redirect('/superadmin');
        }

        if(auth()->user()->role == 'ketua')
        {
            return redirect('/ketua');
        }

        if(auth()->user()->role == 'anggota')
        {
            return redirect('/home-trainer');
        }

        if(auth()->user()->role == 'user')
        {
            return redirect('/home');
        }

    }


    public function index()
    {
        return view('page-login');
    }

    public function ceklogin(Request $request)
    { 

        $credentials = $request->validate([

            'email' => 'required|min:3',
            'password' => 'required|min:3'
        ]);
        

        $data_user = User::where([
                    ['email', '=', $request->email], 
                ])->get();
                
        foreach ($data_user as $data)
        {   
            $email = $data->email;
            $password = $data->password;

            if($request->email != $email)

            {
                return redirect('/login')->with('login_error', 'Gagal.');
            }

            if (!Hash::check($request->password, $password))
            {
                return redirect('/login')->with('login_error', 'Gagal Login.');
            }

        } 
       
        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            
            if(auth()->user()->role == 'superadmin')
            {
                return redirect()->intended('/superadmin');
            }

            if(auth()->user()->role == 'ketua')
            {
                return redirect()->intended('/ketua');
            }

            if(auth()->user()->role == 'anggota')
            {
                return redirect()->intended('/home-trainer');
            }

            if(auth()->user()->role == 'user')
            {
                return redirect()->intended('/home');
            }

        }

        return back()->with('login_error', "Failed Login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
