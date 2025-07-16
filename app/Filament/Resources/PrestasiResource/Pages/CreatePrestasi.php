<?php

namespace App\Filament\Resources\PrestasiResource\Pages;

use App\Filament\Resources\PrestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreatePrestasi extends CreateRecord
{
    protected static string $resource = PrestasiResource::class;

    public function getTitle(): string
    {
        return "Buat Prestasi";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_prestasi'] = Str::upper(Str::random(20));
        $data['id_user'] = Auth::user()->id_user;
        return $data;
    }
}
