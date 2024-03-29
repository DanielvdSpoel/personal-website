<?php

namespace App\Filament\Resources\EmployerResource\Pages;

use App\Filament\Resources\EmployerResource;
use Filament\Pages\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListEmployers extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = EmployerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
