<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function __invoke(Request $request)
    {
        return inertia('Home', [
            'projects' => Project::orderBy('completed_at')
                ->limit(3)
                ->get()->toArray(),
            'employers' => Employer::orderBy('end_date')
                ->with('media')
                ->get()->toArray(),
        ]);
    }
}
