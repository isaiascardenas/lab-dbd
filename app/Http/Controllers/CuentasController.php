<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cuenta;
use App\TipoCuenta;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::whereUserId(request()->user()->id)
            ->with('banco', 'tipoCuenta')
            ->get();

        return view('user.cuentas.index', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = Banco::all();
        $tipoCuentas = TipoCuenta::all();
        return compact('bancos', 'tipoCuentas');
        return view('user.cuentas.create', compact('bancos', 'tipoCuentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Cuenta::create($this->validate($request, [
            'numero_cuenta' => 'required',
            'saldo' => 'required',
            'tipo_cuenta_id' => 'required',
            'banco_id' => 'required',
            'user_id' => 'required',
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        return $cuenta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        $cuenta->load('banco', 'tipoCuenta');
        return view('user.cuentas.edit', compact('cuenta'));
    }

    public function abonar (Request $request, Cuenta $cuenta)
    {
        $cuenta->saldo = $cuenta->saldo + $request->abono;

        $outcome = $cuenta->save();

        if ($outcome) {
            $response = ['success' => 'Se ha realizado el abono exitosamente!'];
        } else {
            $response = ['error' => 'Ha ocurrido un error al realizar el abono'];
        }

        return redirect('/cuentas/'.$cuenta->id.'/edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        $cuenta->fill($this->validate($request, [
            'numero_cuenta',
            'saldo',
            'tipo_cuenta_id',
            'banco_id',
            'user_id',
        ]))->save();

        return $cuenta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return redirect('cuentas');
    }
}
