<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use App\Traits\TranslatableWithEmit;
use Awcodes\Curator\Models\Media;
use Filament\Pages\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }

//    protected function handleRecordCreation(array $data): Project
//    {
//        $project = Project::create($data);
//
//        foreach ($data['media'] as $mediaSettings) {
//            $project->media()->attach($mediaSettings['media_id'], ['theme_availability' => $mediaSettings['theme_availability']]);
//        }
//
//        return $project;
//    }
}
