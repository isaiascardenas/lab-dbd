<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($this->validate($request, [
            'nombre' => 'required',
            'rut' => 'required',
            'email' => 'required',
            'password' => 'confirmed',
            // role id (trigger)
        ]));
        if ($user->usersexists()) {
            $response = ['success' => 'Creado con éxito!'];
        } else {
            $response = ['error' => 'No se ha podido crear!'];
        }

        return redirect('/users')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $outcome = $user->fill($this->validate($request, [
            'rut' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]))->save();

        if ($outcome) {
            $response = ['success' => 'Actualizado con éxito!'];
        } else {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/users/'.$user->id.'/edit')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $response = [];
        try {
            $user->delete();
            $response = ['success' => 'Eliminado con éxito!'];
        } catch (\Exception $e) {
            $response = ['error' => 'Error al eliminar el registro!'];
        }

        return redirect('/users')->with($response);
    }
}
