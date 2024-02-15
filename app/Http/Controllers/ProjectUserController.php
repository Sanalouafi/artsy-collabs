<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectUserStoreRequest;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $existingCollaboration = projectUser::where('user_id', Auth::id())
            ->where('project_id', $request->project_id)
            ->whereIn('status',[0,1])
            ->first();

        if ($existingCollaboration) {
            return redirect()->back()->with('error', 'You have already collaborated on this project.');
        }
        $projectUser = projectUser::create($request->validated());

        return redirect()->back()->with('success', 'Task added successfully!');
    }

    public function update(Request $request, ProjectUser $projectUser)
    {
        $projectUser->status = 1;
        $projectUser->payment = $request->input('payment');

        $projectUser->save();

        return redirect()->back()->with('success', 'Project status updated successfully.');
    }


    public function destroy(projectUser $project_user)
    {
        $project_user->delete();
        return redirect()->route('project_users.index');
    }

}

