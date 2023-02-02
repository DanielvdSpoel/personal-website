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
        $colors_supported = collect([
            'dark' => 0,
            'light' => 0,
        ]);
        $media = collect([]);

        Project::with('media')->get()->each(function ($project) use ($colors_supported, $media) {
            $project->media->each(function ($medium) use ($colors_supported, $media) {
                if ($media->pluck('id')->contains($medium->id)) {
                    return;
                }
                $white_count = $media->where('pivot.theme_availability', 'white')->count();
                $black_count = $media->where('pivot.theme_availability', 'black')->count();
                $both_count = $media->where('pivot.theme_availability', 'both')->count();

                if ($medium->pivot->theme_availability === 'both' && $white_count + $both_count < 5 && $black_count + $both_count < 5) {
                    $media->push($medium);
                    return;
                } else if ($medium->pivot->theme_availability === 'dark' && $black_count + $both_count  < 5) {
                    $media->push($medium);
                    return;
                } else if ($medium->pivot->theme_availability === 'white' && $white_count + $both_count < 5) {
                    $media->push($medium);
                    return;
                }
            });
        });
//        dd($media->toArray());


        return inertia('Home', [
            'projects' => Project::orderBy('completed_at')
                ->limit(3)
                ->get()->toArray(),
            'employers' => Employer::orderBy('end_date')
                ->with('media')
                ->get()->toArray(),
            'media' => $media
        ]);
    }
}
