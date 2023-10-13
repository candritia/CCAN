<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.area.index',[
            
            "areas" => Area::latest()->paginate(10)
            
            // 'areas' => Area::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([


            'name' => ['required','max:255','unique:areas']
        
    ]);

    // $slug = Str::random(10);
    $validatedData['id'] = auth();
        Area::create([
                // 'slug'=>$slug,
                'id'=>$validatedData['id'],
                'name'=>$validatedData['name'],
               


        ]);
    return redirect('/dashboard/areas')->with('success', 'Inputan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        return view('dashboard.area.show',[
            'area' => $area
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        return view('dashboard.area.edit', [
            'area' => $area

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $rules = [
            'name' => ['required','max:255','unique:areas']


        ];
        

        $validatedData = $request->validate($rules);
        // $slug = Str::random(10);
        
        
            Area::where('id',$area->id)->update([
                    // 'slug'=>$slug,
                    'name'=>$validatedData['name']

            ]);
            
            Area::where('id',$area->id)->update($validatedData);
            
        return redirect('/dashboard/areas')->with('success', 'Inputan Berhasil Di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        Area::destroy('id',$area->id);
        
        return redirect('/dashboard/areas')->with('success', 'Inputan Berhasil Di Delete');
    }
}
