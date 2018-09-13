<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function show(User $user)
    {
        return view('user.profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $userData = $this->validate($request, [
            'rut' => 'required',
            'nombre' => 'required',
            'email' => 'required',
        ]);

        if ($request->password) {
            $userData['password'] = $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);
        }

        $outcome = $user->fill($userData)->save();

        if ($outcome) {
            $response = ['success' => 'Actualizado con éxito!'];
        } else {
            $response = ['error' => 'Ha ocurrido un error en la Base de Datos al actualizar!'];
        }

        return redirect('/profile/users/'.$user->id.'/edit')->with($response);
    }
}
