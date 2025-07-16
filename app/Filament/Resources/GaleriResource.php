<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Filament\Resources\GaleriResource\RelationManagers;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galeri Foto';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')
                ->label("Judul Gambar")
                ->columnSpan(1)
                ->required(),
            Forms\Components\TextInput::make('deskripsi')
                ->label("Deskripsi Gambar")
                ->columnSpan(1)
                ->required(),
            Forms\Components\Select::make('id_praktikum')
                ->relationship('praktikum', 'nama_praktikum')
                ->searchable()
                ->preload()
                ->columnSpanFull()
                ->required(),
            Forms\Components\FileUpload::make('url_gambar')
                ->required()
                ->image()
                ->imageEditor()
                ->directory("galeri_foto")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Gambar"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('url_gambar')
                    ->label("Gambar"),
                Tables\Columns\TextColumn::make('judul')
                    ->label("Judul Gambar"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Galeri $record) {
                        if ($record->url_gambar) {
                            Storage::disk('public')->delete($record->url_gambar);
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
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
