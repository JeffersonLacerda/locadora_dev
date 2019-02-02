<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:administrator']);
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'user' => 'required|unique:users',
            'profile' => 'required',
        ]);
        $dados = $request->all();
        $dados['password'] = bcrypt($request->password);
        User::create($dados);
        return redirect()->route('user.index');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.form', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'user' => 'required',
            'profile' => 'required',
        ]);

        $user = User::findOrFail($id);
        $dados = $request->all();
        if($user->password != $request->password){
            $dados['password'] = bcrypt($request->password);
        }
        $user->update($dados);
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try{
            $user->delete();
        }catch (\Exception $e) {
            return redirect()->route('user.index')->with('erro', 'Este registro não pode ser removido afim de garantir a integridade do banco de dados.');
        }
        return redirect()->route('user.index');
    }
}
