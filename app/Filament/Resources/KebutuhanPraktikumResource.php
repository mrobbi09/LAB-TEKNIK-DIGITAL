<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KebutuhanPraktikumResource\Pages;
use App\Filament\Resources\KebutuhanPraktikumResource\RelationManagers;
use App\Models\KebutuhanPraktikum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class KebutuhanPraktikumResource extends Resource
{
    protected static ?string $model = KebutuhanPraktikum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Praktikum';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_praktikum')
                    ->relationship('praktikum', 'nama_praktikum')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('lembar_asistensi')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory("lembar_asistensi")
                    ->preserveFilenames()
                    ->columnSpan(2)
                    ->label("Lembar Asistensi")
                    ->downloadable(),
                Forms\Components\FileUpload::make('lembar_tp')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory("lembar_tp")
                    ->preserveFilenames()
                    ->columnSpan(2)
                    ->label("Lembar Tugas Pendahuluan")
                    ->downloadable(),
                Forms\Components\FileUpload::make('format_margin')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory("format_margin")
                    ->preserveFilenames()
                    ->columnSpan(2)
                    ->label("Format Margin")
                    ->downloadable(),
                Forms\Components\FileUpload::make('format_laprak')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory("format_laprak")
                    ->preserveFilenames()
                    ->columnSpan(2)
                    ->label("Format Laporan Praktikum")
                    ->downloadable(),
                Forms\Components\FileUpload::make('format_absen')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory("format_absen")
                    ->preserveFilenames()
                    ->columnSpan(2)
                    ->label("Format Presensi")
                    ->downloadable(),
                Forms\Components\TextInput::make('link_software')
                    ->label("Link Software")
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('praktikum.nama_praktikum')
                    ->label("Nama Praktikum"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (KebutuhanPraktikum $record) {
                        if ($record->lembar_asistensi) {
                            Storage::disk('public')->delete($record->lembar_asistensi);
                        }
                        if ($record->lembar_tp) {
                            Storage::disk('public')->delete($record->lembar_tp);
                        }
                        if ($record->format_margin) {
                            Storage::disk('public')->delete($record->format_margin);
                        }
                        if ($record->format_laprak) {
                            Storage::disk('public')->delete($record->format_laprak);
                        }
                        if ($record->format_absen) {
                            Storage::disk('public')->delete($record->format_absen);
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
            'index' => Pages\ListKebutuhanPraktikums::route('/'),
            'create' => Pages\CreateKebutuhanPraktikum::route('/create'),
            'edit' => Pages\EditKebutuhanPraktikum::route('/{record}/edit'),
        ];
    }
}
