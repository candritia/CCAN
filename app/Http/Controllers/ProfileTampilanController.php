<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;


class ProfileTampilanController extends Controller
{
    public function index()
    {
        return view('profile',[
            "profiles"=> Profile::latest()->filter(request(['search']))->paginate(4)
        ]);

    }
   
   
   
   
    // public function index()
    // {
    //     $profiles = Profile::latest();

    //     if (request('search')) {
    //         $profiles->where('nama','like','%' . request('search').'%')
    //         ->orWhere('created_at','like','%' . request('search').'%')
    //         ->orWhere('nohp','like','%' . request('search').'%');
    //     }
    //     return view('profile',[
    //         "profiles"=> $profiles->get()
    //     ]);

    // }
        // if(request('author')){
        //     $author = User::firstWhere('username', request('author'));
        // }


        // return view ('profile',[
        //     "profiles" => Profile::latest()->filter(request(['search','author']))->withQueryString()

        // ]); 
    
    
    
    // public function index()
    // {      
    //     return view ('profile',[
    //         "profiles" => Profile::all()
    //      ]); 
    // }
    public function show(Profile $profile)
    {
        return view('profileshow',[
            'profile' => $profile
        ]);
    }
}
