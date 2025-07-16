<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreateGaleri extends CreateRecord
{
    protected static string $resource = GaleriResource::class;

    public function getTitle(): string
    {
        return "Buat Galeri Foto";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_galeri'] = Str::upper(Str::random(20));
        $data['id_user'] = Auth::user()->id_user;
        return $data;
    }
}
