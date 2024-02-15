<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\partner;
use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $partners = partner::all();
        $status = project::STATUS_RADIO;
        return view('admin.projects.create', compact('partners', 'status'));
    }

    public function store(ProjectStoreRequest $request)
    {
        $validatedData = $request->validated();

        $project = Project::create($validatedData);

        if ($request->hasFile('image')) {
            $project->addMedia($request->file('image'))->toMediaCollection('project');
        }


        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $partners = partner::all();
        $status = project::STATUS_RADIO;
        return view('admin.projects.edit', compact('project','partners','status'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $project->update($validatedData);

        if ($request->hasFile('image')) {
            $project->addMedia($request->file('image'))->toMediaCollection('project', 'media_projects');
        }

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
    public function home(){
        $projects = Project::where('status', 3)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
        return view('welcome',compact('projects'));
}
}
