<?php

namespace App\Http\Controllers;

use App\Models\Petugasan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('dashboard.petugasan.index',[
            
            "petugasans" => Petugasan::latest()->paginate(10)
            // 'petugasans' => Petugasan::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.petugasan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([


            'name' => ['required','max:255','unique:petugasans']


            
        ]);

        // $slug = Str::random(10);
        $validatedData['id'] = auth();
            Petugasan::create([
                    // 'slug'=>$slug,
                    'id'=>$validatedData['id'],
                    'name'=>$validatedData['name'],
                   


            ]);
        return redirect('/dashboard/petugasans')->with('success', 'Inputan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugasan $petugasan)
    {
        return view('dashboard.petugasan.show',[
            'petugasan' => $petugasan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugasan $petugasan)
    {
        return view('dashboard.petugasan.edit', [
            'petugasan' => $petugasan

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugasan $petugasan)
    {

        $rules = [
            'name' => ['required','max:255','unique:petugasans']
            
        ];
        

        $validatedData = $request->validate($rules);
        // $slug = Str::random(10);
        
        
            Petugasan::where('id',$petugasan->id)->update([
                    // 'slug'=>$slug,
                    'name'=>$validatedData['name']

            ]);
            
            Petugasan::where('id',$petugasan->id)->update($validatedData);
            
        return redirect('/dashboard/petugasans')->with('success', 'Inputan Berhasil Di Update!!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugasan $petugasan)
    {
        Petugasan::destroy('id',$petugasan->id);
        
        return redirect('/dashboard/petugasans')->with('success', 'Inputan Berhasil Di Delete');
    }
    
    

}


