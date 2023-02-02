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
        $project->load('media');
        $project->load('skills.media');
        return inertia('ViewProject', [
            'project' => $project,
        ]);
    }
}
