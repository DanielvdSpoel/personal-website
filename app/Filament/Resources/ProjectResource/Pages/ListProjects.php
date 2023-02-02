<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Traits\TranslatableWithEmit;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    use TranslatableWithEmit;

    protected static string $resource = ProjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
