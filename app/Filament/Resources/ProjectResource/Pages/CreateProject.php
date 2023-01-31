<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use Awcodes\Curator\Models\Media;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function handleRecordCreation(array $data): Project
    {
        $project = Project::create($data);

        foreach ($data['media'] as $mediaSettings) {
            $project->media()->attach($mediaSettings['media_id'], ['theme_availability' => $mediaSettings['theme_availability']]);
        }

        return $project;
    }
}
