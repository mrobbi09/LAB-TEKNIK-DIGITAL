<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OprecResource\Pages;
use App\Filament\Resources\OprecResource\RelationManagers;
use App\Models\Oprec;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class OprecResource extends Resource
{
    protected static ?string $model = Oprec::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationLabel = 'Open Recruitment';

    protected static ?string $navigationGroup = 'Manajemen Rekrutmen';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')
                ->label("Nama Lengkap")
                ->columnSpanFull()
                ->required(),
            Forms\Components\Select::make('kelas')
                ->options([
                    'PSTI A' => 'PSTI A',
                    'PSTI B' => 'PSTI B',
                    'PSTI C' => 'PSTI C',
                    'PSTI D' => 'PSTI D',
                ])
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\TextInput::make('angkatan')
                ->label("Angkatan")
                ->required(),
            Forms\Components\FileUpload::make('cv')
                ->required()
                ->directory("curiculum_vitae")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Curiculum Vitae")
                ->downloadable(),
            Forms\Components\FileUpload::make('transkrip')
                ->required()
                ->directory("transkrip")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Transkrip")
                ->downloadable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label("Nama Lengkap"),
                Tables\Columns\TextColumn::make('kelas')
                    ->label("Kelas"),
                Tables\Columns\TextColumn::make('angkatan')
                    ->label("Angkatan"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Oprec $record) {
                        if ($record->cv) {
                            Storage::disk('public')->delete($record->cv);
                        }
                        if ($record->transkrip) {
                            Storage::disk('public')->delete($record->transkrip);
                        }
                    }),
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
            'index' => Pages\ListOprecs::route('/'),
            'create' => Pages\CreateOprec::route('/create'),
            'edit' => Pages\EditOprec::route('/{record}/edit'),
        ];
    }
}
