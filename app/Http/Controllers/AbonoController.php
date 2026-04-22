<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\RegistroCuenta;
use Illuminate\Http\Request;

class AbonoController extends Controller
{
    public function index()
    {
       $abonos = Abono::with('registroCuenta.familiar.ninio.persona', 'registroCuenta.familiar.persona')->get();
    
        return view("abonos.index", compact("abonos"));
    }

    public function create()
    {
       $cuentas = RegistroCuenta::with('familiar.persona')->get();
        return view("abonos.create", compact("cuentas"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cantidad_abono' => 'required',
            'fecha_abono' => 'required',
            'id_registrocuenta' => 'required'
        ]);

        Abono::create($request->all());
        return redirect()->route("abonos.index");
    }

    public function edit(Abono $abono)
    {
        $cuentas = RegistroCuenta::all();
        return view("abonos.edit", compact("abono", "cuentas"));
    }

    public function update(Request $request, Abono $abono)
    {
        $request->validate([
            'cantidad_abono' => 'required',
            'fecha_abono' => 'required',
            'id_registrocuenta' => 'required'
        ]);

        $abono->update($request->all());
        return redirect()->route("abonos.index");
    }

    public function destroy(Abono $abono)
    {
        $abono->delete();
        return redirect()->route("abonos.index");
    }
}