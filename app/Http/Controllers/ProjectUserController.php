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
    // Get the currently authenticated user
    $user = Auth::user();

    // Retrieve projects associated with the authenticated user
    $projects = $user->project_user()->where('status', 1)->get();

    return view("artist.projects", compact("projects"));
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


    public function destroy(projectUser $projectUser)
    {
        $projectUser->delete();
        return redirect()->route('projects.index');
    }

}

