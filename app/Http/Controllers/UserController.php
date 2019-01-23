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
            'email' => 'required|email|confirmed|unique:users',
            'password' => 'required',
            'user' => 'required|unique:users',
            'profile' => 'required',
        ]);
        User::create($request->all());
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
            'email' => 'required|email|confirmed|unique:users',
            'password' => 'required',
            'user' => 'required|unique:users',
            'profile' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
