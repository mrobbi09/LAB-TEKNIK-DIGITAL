<?php

namespace App\Filament\Resources\PraktikumResource\Pages;

use App\Filament\Resources\PraktikumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePraktikum extends CreateRecord
{
    protected static string $resource = PraktikumResource::class;

    public function getTitle(): string
    {
        return "Buat Praktikum";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_praktikum'] = Str::upper(Str::random(20));
        return $data;
    }
}
