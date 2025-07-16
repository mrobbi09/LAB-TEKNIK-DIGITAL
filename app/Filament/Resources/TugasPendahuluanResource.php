<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TugasPendahuluanResource\Pages;
use App\Filament\Resources\TugasPendahuluanResource\RelationManagers;
use App\Models\TugasPendahuluan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TugasPendahuluanResource extends Resource
{
    protected static ?string $model = TugasPendahuluan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Tugas Pendahuluan';

    protected static ?string $navigationGroup = 'Praktikum';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('id_judul')
                ->relationship('judul', 'nama_judul')
                ->searchable()
                ->preload()
                ->required()
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('soal_tp')
                ->required()
                ->acceptedFileTypes(['application/pdf'])
                ->directory("soal_tp")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Soal Tugas Pendahuluan"),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul.nama_judul')
                    ->sortable()
                    ->searchable()
                    ->label("Judul Praktikum"),
                Tables\Columns\TextColumn::make('soal_tp')
                    ->html()
                    ->label("Soal Tugas Pendahuluan"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (TugasPendahuluan $record) {
                        if ($record->soal_tp) {
                            Storage::disk('public')->delete($record->soal_tp);
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
            'index' => Pages\ListTugasPendahuluans::route('/'),
            'create' => Pages\CreateTugasPendahuluan::route('/create'),
            'edit' => Pages\EditTugasPendahuluan::route('/{record}/edit'),
        ];
    }
}
