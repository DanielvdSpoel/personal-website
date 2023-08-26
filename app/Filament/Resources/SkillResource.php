<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Filament\Resources\SkillResource\RelationManagers;
use App\Models\Skill;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillResource extends Resource
{
    use Translatable;
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function getTranslatableLocales(): array
    {
        return ['en', 'nl'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->url()
                    ->maxLength(255),
                CuratorPicker::make('media_id')
                    ->name('Logo')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('media')->label('Logo'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()->sortable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();

                        if (strlen($state) <= $column->getLimit()) {
                            return null;
                        }

                        // Only render the tooltip if the column contents exceeds the length limit.
                        return $state;
                    }),

                Tables\Columns\TextColumn::make('url'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->reorderable();
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
