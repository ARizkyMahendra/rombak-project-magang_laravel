<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use RealRashid\SweetAlert\Facades\Alert;

class authController extends Controller
{
    public function login(){
        return view('login.login', [
            'title' => 'Login Page'
        ]);
    }

    public function submitLogin(Request $request){
        $data = $request->only('email', 'password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            Alert::toast('Selamat Datang Admin', 'success');
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('gagal','Email atau Password salah');
        }
    }

    public function register(){
        return view('login.register', [
            'title' => 'Registration Page'
        ]);
    }

    public function submitRegister(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Alert::toast('Registrasi Berhasil', 'success');
        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect()->route('dashboard');
    }
}
