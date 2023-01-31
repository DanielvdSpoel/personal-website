<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return inertia('Projects', [
            'projects' => Project::orderBy('completed_at')
                ->with('media')
                ->get(),
        ]);
    }

    public function show(string $language, Project $project)
    {
        dd($project);
        return inertia('Project', [
            'project' => $project,
        ]);
    }
}
