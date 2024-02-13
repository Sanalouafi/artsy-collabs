<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = user::where('role_id', 2)->get();
        return view('admin.artists.index', compact('users'));
    }

    public function create()
    {
        return view('admin.artists.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'domain' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($request->password),
            'domain' => $validatedData['domain'],
            'status' => 1,
            'role_id' => 2,
        ]);

        if ($request->hasFile('image')) {
            $user->addMedia($request->file('image'))->toMediaCollection('avatar');
        }

        return redirect()->route('admin.index')->with('success', 'User created successfully.');

    }

    public function show(user $user)
    {
    }

    public function edit(user $artist)
    {
        return view('admin.artists.edit', ['artist' => $artist]);
    }

    public function update(Request $request, User $artist)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $artist->id,
            'domain' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $artist->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'domain' => $validatedData['domain'],
        ]);

        if ($request->hasFile('image')) {
            $artist->clearMediaCollection('avatar');
            $artist->addMedia($request->file('image'))->toMediaCollection('avatar');
        }

        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    public function destroy(User $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index')->with('success', 'Artist deleted successfully.');
    }
}
