<?php

namespace App\Http\Controllers;

use App\Models\project_user;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function index()
    {
        $project_users = project_user::all();
        return view('project_users.index', compact('project_users'));
    }

    public function create()
    {
        return view('project_users.create');
    }

    public function store(Request $request)
    {
        project_user::create($request->all());
        return redirect()->route('project_users.index');
    }

    public function show(project_user $project_user)
    {
        return view('project_users.show', compact('project_user'));
    }

    public function edit(project_user $project_user)
    {
        return view('project_users.edit', compact('project_user'));
    }

    public function update(Request $request, project_user $project_user)
    {
        $project_user->update($request->all());
        return redirect()->route('project_users.index');
    }

    public function destroy(project_user $project_user)
    {
        $project_user->delete();
        return redirect()->route('project_users.index');
    }
}

