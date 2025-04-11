<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        //prendo tutti i progetti dal database
        $projects = Project::with('type', 'technologies')->get();
        //dd($projects);
        return response()->json(
            [
                'success' => 'true',
                'data' => $projects
            ],
        );
    }

    public function show(Project $project)
    {
        //prendo il progetto dal database
        $project->load('type', 'technologies');
        //dd($project); // Rimuovi o commenta questa linea
        return response()->json(
            [
                'success' => 'true',
                'data' => $project
            ],
        );
    }
}
