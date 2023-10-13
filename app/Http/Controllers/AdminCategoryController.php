<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('dashboard.categories.index',[
            "categories" => Category::latest()->paginate(10)
            
            // 'categories' => Category::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name'=> ['required','max:255','unique:categories']
            
        ]);

        // $slug = Str::random(10);
        $validatedData['id'] = auth();
            Category::create([
                    // 'slug'=>$slug,
                    'id'=>$validatedData['id'],
                    'name'=>$validatedData['name'],
                   


            ]);
        return redirect('/dashboard/categories')->with('success', 'Inputan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.categories.show',[
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $rules = [
            'name'=> ['required','max:255','unique:categories']

        ];
        

        $validatedData = $request->validate($rules);
        // $slug = Str::random(10);
        
        
            Category::where('id',$category->id)->update([
                    // 'slug'=>$slug,
                    'name'=>$validatedData['name']

            ]);
            
            Category::where('id',$category->id)->update($validatedData);
            
        return redirect('/dashboard/categories')->with('success', 'Inputan Berhasil Di Update!!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy('id',$category->id);
        
        return redirect('/dashboard/categories')->with('success', 'Inputan Berhasil Di Delete');
    }
    
    

}


