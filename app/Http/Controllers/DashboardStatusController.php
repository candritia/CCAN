<?php

namespace App\Http\Controllers;

use App\Models\Statusa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.status.index',[
            "statusas" => Statusa::latest()->paginate(10)
            // 'statusas' => Statusa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([


            'name' => ['required','max:255','unique:statusas']
        
    ]);

    // $slug = Str::random(10);
    $validatedData['id'] = auth();
        Statusa::create([
                // 'slug'=>$slug,
                'id'=>$validatedData['id'],
                'name'=>$validatedData['name'],
               


        ]);
    return redirect('/dashboard/statusas')->with('success', 'Inputan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Statusa $statusa)
    {
        return view('dashboard.status.show',[
            'statusa' => $statusa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statusa $statusa)
    {
        return view('dashboard.status.edit', [
            'statusa' => $statusa

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statusa $statusa)
    {
        $rules = [
            'name' => ['required','max:255','unique:statusas']


        ];
        

        $validatedData = $request->validate($rules);
        // $slug = Str::random(10);
        
        
            Statusa::where('id',$statusa->id)->update([
                    // 'slug'=>$slug,
                    'name'=>$validatedData['name']

            ]);
            
            Statusa::where('id',$statusa->id)->update($validatedData);
            
        return redirect('/dashboard/statusas')->with('success', 'Inputan Berhasil Di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statusa $statusa)
    {
        Statusa::destroy('id',$statusa->id);
        
        return redirect('/dashboard/statusas')->with('success', 'Inputan Berhasil Di Delete');
    }
}
