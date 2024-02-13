<?php

namespace App\Http\Controllers;

use App\Models\partner;
use App\Models\projectUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectCount = projectUser::count();
        $partnerCount = partner::count();
        $userCountBlock = User::where('status', 0)->count();
        $users = User::where('status', 1)
            ->whereHas('role', function ($query) {
                $query->where('name', 'artist');
            })->count();
        $usersBlock = User::where('status', 0)->get();
        return view('admin.dashboard', compact('projectCount', 'partnerCount', 'userCountBlock', 'users', 'usersBlock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateStatus($id)
    {
        $user = User::find($id);

        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully.');
    }
}
