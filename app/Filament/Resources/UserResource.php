<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Pengguna';

    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('foto_profil')
                    ->label('Foto Profil')
                    ->avatar()
                    ->directory('avatars')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('nama_lengkap')->required()
                    ->label("Nama Lengkap"),
                TextInput::make('username')->required(),
                TextInput::make('npm')->required()
                    ->label("NPM"),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                Select::make('id_kelompok')
                    ->relationship('kelompok', 'nama_kelompok')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->required(),
                Select::make('id_praktikum')
                    ->relationship('praktikum', 'nama_praktikum')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->required(),
                TextInput::make('email')->email()->required(),
                Select::make('peran')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_profil')
                    ->label('Foto')
                    ->circular(),
                TextColumn::make('npm')
                    ->label("NPM"),
                TextColumn::make('username'),
                TextColumn::make('nama_lengkap')
                    ->label("Nama Lengkap"),
                TextColumn::make('email'),
                TextColumn::make('peran'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
