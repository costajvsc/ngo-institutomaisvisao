<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!Auth::attempt($credentials))
            return redirect()->back()->withErrors('Usuário e/ou senha inválidas');

        return redirect()->route('dashboard');

    }

    public function index()
    {
        $usuarios = User::where('deleted', false)->paginate(15);

        return view('usuarios/index', [
            'usuarios' => $usuarios
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        if(!User::create($data))
            return back()->withErrors('Um erro ocorreu ao criar o usuário '.$data['name'].'.');

        return back(201)->with('success', 'O usuário '.$data['name'].' foi criado com sucesso.');
    }

    public function delete(Request $request)
    {
        $usuario = User::findOrFail($request->id);

        return view('usuarios/delete', [
            'usuario' => $usuario
        ]);
    }

    public function destroy(Request $request)
    {
        $usuario = User::findOrFail($request->id);

        $usuario->deleted = true;
        $usuario->deleted_at = date("Y-m-d H:i:s");

        if(!$usuario->save())
            return redirect('/usuarios')->withErrors('Um erro ocorreu ao excluir o usuario '.$usuario['name'].'.');

        return redirect('/usuarios')->with('warning', 'O usuario '.$usuario['name'].' foi excluido com sucesso.');
    }

    public function edit(Request $request)
    {
        $usuario = User::findOrFail($request->id);

        return view('usuarios.edit',[
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        $data['password'] = Hash::make($data['password']);

        if(!User::where('id', $data['id'])->update($data))
            return redirect('/usuarios')->withErrors('Um erro ocorreu ao atualizada o usuario '.$data['name'].'.');

        return redirect('/usuarios')->with('warning', 'O usuário '.$data['name'].' foi atualizado com sucesso.');
    }

}
