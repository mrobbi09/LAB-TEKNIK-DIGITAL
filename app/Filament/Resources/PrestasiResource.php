<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiResource\Pages;
use App\Filament\Resources\PrestasiResource\RelationManagers;
use App\Models\Prestasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $navigationLabel = 'Prestasi';

    protected static ?string $navigationGroup = 'Akademik';

    protected static ?int $navigationSort = 12;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul_prestasi')
                ->label("Judul Prestasi")
                ->required(),
            Forms\Components\DatePicker::make('tanggal_prestasi')
                ->native(false)
                ->label("Tanggal Prestasi")
                ->required(),
            Forms\Components\RichEditor::make('deskripsi_prestasi')
                ->columnSpanFull()
                ->required()
                ->label("Deskripsi Prestasi"),
            Forms\Components\FileUpload::make('gambar_prestasi')
                ->required()
                ->image()
                ->imageEditor()
                ->directory("prestasi")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Gambar Prestasi")
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar_prestasi')
                    ->label("Gambar Prestasi"),
                Tables\Columns\TextColumn::make('judul_prestasi')
                    ->label("Judul Prestasi"),
                Tables\Columns\TextColumn::make('tanggal_prestasi')
                    ->date()
                    ->label("Judul Prestasi"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Prestasi $record) {
                        if ($record->gambar_prestasi) {
                            Storage::disk('public')->delete($record->gambar_prestasi);
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
            'index' => Pages\ListPrestasis::route('/'),
            'create' => Pages\CreatePrestasi::route('/create'),
            'edit' => Pages\EditPrestasi::route('/{record}/edit'),
        ];
    }
}
