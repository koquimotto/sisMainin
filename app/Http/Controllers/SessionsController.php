<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function create(){
        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message' => 'El usuario o la contraseña son incorrectas, por favor intenta nuevamente'
            ]);
        }
        return redirect()->to('modulos');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }

    // public function dashboard(){
    //     return view('dashboard');
    // }
}
