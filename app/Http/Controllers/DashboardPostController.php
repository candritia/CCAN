<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\DB;
use App\Models\Area;
use App\Models\Perbaikan;
use App\Models\Petugasan;
use App\Models\Category;
use App\Models\Statusa;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index(){
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->paginate(4)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all(),
            'perbaikans' => Perbaikan::all(),
            'petugasans' => Petugasan::all(),
            'areas' => Area::all(),
            'statusas' => Statusa::all()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            // 'ticket' => 'required|max:300',
            'nama_costemer' => 'required|max:250',
            'nama_pic' => 'required|max:255',
            'tgl' => 'required',
            // 'service_id' => 'required|max:255',
            'area_id' => 'required',
            'category_id' => 'required',
            'petugasan_id' => 'required',
            'perbaikan_id' => 'required',
            'statusa_id' => 'required'

        ]);

        $slug = Str::random(10);
        $validatedData['user_id'] = auth()->user()->id;
            Post::create([
                    'slug'=>$slug,
                    'user_id'=>$validatedData['user_id'],
                    // 'ticket'=>$validatedData['ticket'],
                    'nama_costemer'=>$validatedData['nama_costemer'],
                    'nama_pic'=>$validatedData['nama_pic'],
                    'tgl'=>$validatedData['tgl'],
                    // 'service_id'=>$validatedData['service_id'],
                    'area_id'=>$validatedData['area_id'],
                    'category_id'=>$validatedData['category_id'],
                    'petugasan_id'=>$validatedData['petugasan_id'],
                    'perbaikan_id'=>$validatedData['perbaikan_id'],
                    'statusa_id'=>$validatedData['statusa_id']

            ]);
        return redirect('/dashboard/posts')->with('success', 'Inputan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'perbaikans' => Perbaikan::all(),
            'petugasans' => Petugasan::all(),
            'areas' => Area::all(),
            'statusas' => Statusa::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [

            // 'ticket' => 'required|max:300',
            'nama_costemer' => 'required|max:250',
            'nama_pic' => 'required|max:255',
            'tgl' => 'required',
            // 'service_id' => 'required|max:255',
            'area_id' => 'required',
            'category_id' => 'required',
            'petugasan_id' => 'required',
            'perbaikan_id' => 'required',
            'statusa_id' => 'required'
        ];
        

        $validatedData = $request->validate($rules);
        $slug = Str::random(10);
        $validatedData['user_id'] = auth()->user()->id;
        
        
            Post::where('id', $post->id)->update([
                    'slug'=>$slug,
                    'user_id'=>$validatedData['user_id'],
                    // 'ticket'=>$validatedData['ticket'],
                    'nama_costemer'=>$validatedData['nama_costemer'],
                    'nama_pic'=>$validatedData['nama_pic'],
                    'tgl'=>$validatedData['tgl'],
                    // 'service_id'=>$validatedData['service_id'],
                    'area_id'=>$validatedData['area_id'],
                    'category_id'=>$validatedData['category_id'],
                    'petugasan_id'=>$validatedData['petugasan_id'],
                    'perbaikan_id'=>$validatedData['perbaikan_id'],
                    'statusa_id'=>$validatedData['statusa_id']

            ]);
            
            Post::where('id', $post->id)->update($validatedData);
            
        return redirect('/dashboard/posts')->with('success', 'Inputan Berhasil Di Update!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Inputan Berhasil Di Delete!');
    }
    
    

}


