<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');        
    }

    public function store(Request $request){
        $user = new User();
        $user->nombres = $request->name;
        $user->apellidos = $request->surname;
        $user->type = $request->slc;
        $user->email = $request->email;
        $user->photo = 'admin.png';
        $user->password = bcrypt($request->password);

        $user->save();
        // auth()->login($user);
        return redirect()->to('/');
    }
}
