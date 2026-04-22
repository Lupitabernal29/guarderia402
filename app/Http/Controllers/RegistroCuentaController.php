<?php

namespace App\Http\Controllers;

use App\Models\RegistroCuenta;
use App\Models\Familiar;
use Illuminate\Http\Request;

class RegistroCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuentas = RegistroCuenta::with('familiar.persona')->get();
        return view("registros.index", compact("cuentas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familiares = Familiar::with('persona')->get();
        return view("registros.create", compact("familiares"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_cuenta' => 'required',
            'id_familiar' => 'required'
        ]);

        RegistroCuenta::create($request->all());
        return redirect()->route("registro_cuentas.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistroCuenta $registro_cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroCuenta $registro_cuenta)
    {
        $familiares = Familiar::with('persona')->get();
        return view("registros.edit", compact("registro_cuenta", "familiares"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroCuenta $registro_cuenta)
    {
        $request->validate([
            'numero_cuenta' => 'required',
            'id_familiar' => 'required'
        ]);

        $registro_cuenta->update($request->all());
        return redirect()->route("registro_cuentas.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroCuenta $registro_cuenta)
    {
        $registro_cuenta->delete();
        return redirect()->route("registro_cuentas.index");
    }
}