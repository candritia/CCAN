<?php

namespace App\Http\Controllers;

use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.perbaikan.index',[
            
            "perbaikans" => Perbaikan::latest()->paginate(10)
            // 'perbaikans' => Perbaikan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.perbaikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([


            'name' => ['required','max:255','unique:perbaikans']
        
    ]);

    // $slug = Str::random(10);
    $validatedData['id'] = auth();
        Perbaikan::create([
                // 'slug'=>$slug,
                'id'=>$validatedData['id'],
                'name'=>$validatedData['name'],
               


        ]);
    return redirect('/dashboard/perbaikans')->with('success', 'Inputan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perbaikan $perbaikan)
    {
        return view('dashboard.perbaikan.show',[
            'perbaikan' => $perbaikan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perbaikan $perbaikan)
    {
        return view('dashboard.perbaikan.edit', [
            'perbaikan' => $perbaikan,
            'perbaikans' => Perbaikan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perbaikan $perbaikan)
    {
        $rules = [
            'name' => ['required','max:255','unique:perbaikans']

        ];
        

        $validatedData = $request->validate($rules);
        // $slug = Str::random(10);
        
        
            Perbaikan::where('id',$perbaikan->id)->update([
                    // 'slug'=>$slug,
                    'name'=>$validatedData['name']

            ]);
            
            Perbaikan::where('id',$perbaikan->id)->update($validatedData);
            
        return redirect('/dashboard/perbaikans')->with('success', 'Inputan Berhasil Di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perbaikan $perbaikan)
    {
        perbaikan::destroy('id',$perbaikan->id);
        
        return redirect('/dashboard/perbaikans')->with('success', 'Inputan Berhasil Di Delete');
    }
}
