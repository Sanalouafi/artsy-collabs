<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show(user $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(user $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, user $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
