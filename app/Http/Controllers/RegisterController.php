<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[

            'title' => 'Register',
            'active' => 'register'

        ]);
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|unique:users',
            'password' => 'required|min:3|max:255'

        ]);
        
            // $validateData['password'] = bycrypt($validateData['password']);

            $validateData['password'] = Hash::make($validateData['password']);
            


        User::create($validateData);

        // $request->session()->flash('success','Registration succesfull! please login');
        
        return redirect('/')->with('success','Registration Berhasil, Silahkan Login!');
    }
}
