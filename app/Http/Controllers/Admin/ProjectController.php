<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $newProject = new Project();
        $newProject->name = $data['title'];
        $newProject->type_id = $data['type_id'];
        $newProject->client = $data['client'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        $newProject->description = $data['description'];

        if (array_key_exists('image', $data)) {
            $img_url = Storage::putFile('projects', $data['image']);
            $newProject->image = $img_url;
        }

        $newProject->save();

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('projects.show', $newProject);
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $project->name = $data['name'];
        $project->type_id = $data['type_id'];
        $project->client = $data['client'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->description = $data['description'];

        if (array_key_exists('image', $data)) {
            if (!is_null($project->image)) {
                Storage::delete($project->image);
            }
            $img_url = Storage::putFile('projects', $data['image']);
            $project->image = $img_url;
        }

        $project->update();

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route("projects.show", $project);
    }

    public function destroy(Project $project)
    {
        if (!is_null($project->image)) {
            Storage::delete($project->image);
        }
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route("projects.index");
    }
}
