<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TugasAkhirResource\Pages;
use App\Filament\Resources\TugasAkhirResource\RelationManagers;
use App\Models\TugasAkhir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class TugasAkhirResource extends Resource
{
    protected static ?string $model = TugasAkhir::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $navigationLabel = 'Tugas Akhir';

    protected static ?string $navigationGroup = 'Praktikum';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('id_judul')
                ->relationship('judul', 'nama_judul')
                ->searchable()
                ->preload()
                ->required()
                ->columnSpanFull(),
            Forms\Components\FileUpload::make('soal_ta')
                ->required()
                ->acceptedFileTypes(['application/pdf'])
                ->directory("soal_ta")
                ->preserveFilenames()
                ->columnSpan(2)
                ->label("Soal Tugas Akhir"),
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
                Tables\Columns\TextColumn::make('soal_ta')
                    ->html()
                    ->label("Soal Tugas Akhir"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function (TugasAkhir $record) {
                        if ($record->soal_ta) {
                            Storage::disk('public')->delete($record->soal_ta);
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
            'index' => Pages\ListTugasAkhirs::route('/'),
            'create' => Pages\CreateTugasAkhir::route('/create'),
            'edit' => Pages\EditTugasAkhir::route('/{record}/edit'),
        ];
    }
}
