<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JudulResource\Pages;
use App\Filament\Resources\JudulResource\RelationManagers;
use App\Models\Judul;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JudulResource extends Resource
{
    protected static ?string $model = Judul::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationLabel = 'Judul Praktikum';

    protected static ?string $navigationGroup = 'Praktikum';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('id_praktikum')
                ->relationship('praktikum', 'nama_praktikum')
                ->searchable()
                ->preload()
                ->required(),
            Forms\Components\TextInput::make('nama_judul')
                ->label("Nama Judul"),
            Forms\Components\FileUpload::make('modul')
                ->required()
                ->acceptedFileTypes(['application/pdf'])
                ->directory("modul")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Modul")
                ->downloadable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_judul')
                    ->label("Nama Judul"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Judul $record) {
                        if ($record->modul) {
                            Storage::disk('public')->delete($record->modul);
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
            'index' => Pages\ListJuduls::route('/'),
            'create' => Pages\CreateJudul::route('/create'),
            'edit' => Pages\EditJudul::route('/{record}/edit'),
        ];
    }
}
