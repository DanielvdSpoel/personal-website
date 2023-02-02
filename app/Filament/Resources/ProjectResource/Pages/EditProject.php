<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use App\Traits\TranslatableWithEmit;
use Awcodes\Curator\Models\Media;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProject extends EditRecord
{
    use TranslatableWithEmit;

    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['media'] = $this->record->media->map(function (Media $media) {
            return [
                'media_id' => $media->id,
                'theme_availability' => $media->pivot->theme_availability,
            ];
        })->toArray();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        foreach ($data['media'] as $mediaSettings) {
            if ($record->media->pluck('id')->contains($mediaSettings['media_id'])) {
                $record->media()->updateExistingPivot($mediaSettings['media_id'], ['theme_availability' => $mediaSettings['theme_availability']]);
            } else {
                $record->media()->attach($mediaSettings['media_id'], ['theme_availability' => $mediaSettings['theme_availability']]);
            }

        }

        return $record;
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
