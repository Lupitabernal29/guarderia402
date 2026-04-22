<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $familiares= Familiar::all();
        return view("familiares.index" , compact("familiares"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("familiares.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'id_persona' => 'required',
            'telefono' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'id_parentesco' => 'required',
            'id_ninio' => 'required',
        ]);
        Familiar::create($request->all());
        return redirect()->route("familiares.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Familiar $familiar)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Familiar $familiar)
    {
        //
        return view("familiares.edit" , compact("familiar"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Familiar $familiar)
    {
        //
        $request->validate([
        'id_persona' => 'required',
        'telefono' => 'required',
        'dni' => 'required',
        'direccion' => 'required',
        'id_parentesco' => 'required',
        'id_ninio' => 'required',
    ]);

    $familiar->update($request->all());

    return redirect()->route("familiares.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familiar $familiar)
    {
        //
         $familiar->delete();
        return redirect()->route("familiares.index");

    }
}
