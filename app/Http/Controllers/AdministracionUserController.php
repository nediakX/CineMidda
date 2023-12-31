<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministracionUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('administracion-user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('administracion-user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($user->role === 'admin') {
            if (!$request->has('current_password') || !Hash::check($request->input('current_password'), $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'La contraseña anterior es incorrecta.']);
            }
        }

        if ($request->has('password') && $request->has('password_confirmation')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user->password = Hash::make($request->input('password'));
        }

        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('administracion-user.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('administracion-user.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
