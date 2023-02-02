<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Models\Skill;
use App\Traits\HasTranslatableOwner;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillsRelationManager extends RelationManager
{
    use HasTranslatableOwner;
    protected static string $relationship = 'skills';

    protected static ?string $recordTitleAttribute = 'name->en';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->recordSelect(function (RelationManager $livewire) {
                        return Forms\Components\Select::make('recordId')
                            ->label(__('filament-support::actions/attach.single.modal.fields.record_id.label'))
                            ->getSearchResultsUsing(fn (string $search) => Skill::where('name->en', 'like', "%{$search}%")
                                ->whereNotIn('id', $livewire->ownerRecord->skills->pluck('id'))
                                ->pluck('name', 'id'))
                            ->getOptionLabelUsing(fn ($value): ?string => Skill::find($value)?->name)
                            ->preload()
                            ->required()
                            ->searchable()
                            ->disableLabel();
                    })
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
            ])
            ->reorderable('sort_order');
    }
}
