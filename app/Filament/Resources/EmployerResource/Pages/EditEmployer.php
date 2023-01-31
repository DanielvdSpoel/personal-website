<?php

namespace App\Filament\Resources\EmployerResource\Pages;

use App\Filament\Resources\EmployerResource;
use Filament\Pages\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\EditRecord;

class EditEmployer extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = EmployerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
