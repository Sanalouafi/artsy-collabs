<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUserStoreRequest;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function index()
    {
        $project_users = ProjectUser::all();
        return view('project_users.index', compact('project_users'));
    }

    public function create()
    {
    }

    public function store(ProjectUserStoreRequest $request)
    {
        $projectUser = projectUser::create($request->validated());

        return redirect()->back()->with('success', 'Task added successfully!');
    }

    public function show(projectUser $project_user)
    {
        return view('project_users.show', compact('project_user'));
    }

    public function edit(projectUser $project_user)
    {
        return view('project_users.edit', compact('project_user'));
    }

    public function update(Request $request, projectUser $project_user)
    {
        $project_user->update($request->all());
        return redirect()->route('project_users.index');
    }

    public function destroy(projectUser $project_user)
    {
        $project_user->delete();
        return redirect()->route('project_users.index');
    }
}

