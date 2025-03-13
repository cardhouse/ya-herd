<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BreedingRecordResource\Pages;
use App\Filament\Resources\BreedingRecordResource\RelationManagers;
use App\Models\BreedingRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BreedingRecordResource extends Resource
{
    protected static ?string $model = BreedingRecord::class;

    protected static ?string $navigationGroup = 'Herd Management';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('herd_id')
                    ->relationship('herd', 'name')
                    ->required(),
                Forms\Components\Select::make('female_id')
                    ->relationship('female', 'name')
                    ->required(),
                Forms\Components\Select::make('male_id')
                    ->relationship('male', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('herd.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('female.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('male.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListBreedingRecords::route('/'),
            'create' => Pages\CreateBreedingRecord::route('/create'),
            'edit' => Pages\EditBreedingRecord::route('/{record}/edit'),
        ];
    }
}
