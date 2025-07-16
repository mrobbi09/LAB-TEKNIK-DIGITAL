<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalResource\Pages;
use App\Filament\Resources\JadwalResource\RelationManagers;
use App\Models\Jadwal;
use App\Models\Judul;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Jadwal Praktikum';

    protected static ?string $navigationGroup = 'Praktikum';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal_waktu')
                    ->native(false)
                    ->label("Tanggal dan Waktu")
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('id_kelompok')
                    ->relationship('kelompok', 'nama_kelompok')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('id_judul')
                    ->relationship('judul', 'nama_judul')
                    ->searchable()
                    ->disabled(fn (callable $get) => !$get('id_kelompok'))
                    ->preload()
                    ->label("Judul Praktikum")
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_waktu')
                    ->dateTime()
                    ->label("Tanggal dan Waktu"),
                Tables\Columns\TextColumn::make('kelompok.nama_kelompok')
                    ->label("Kelompok"),
                Tables\Columns\TextColumn::make('judul.nama_judul')
                    ->label("Judul"),
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
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
        ];
    }
}
