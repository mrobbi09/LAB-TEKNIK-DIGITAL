<?php

namespace App\Filament\Resources\JudulResource\Pages;

use App\Filament\Resources\JudulResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateJudul extends CreateRecord
{
    protected static string $resource = JudulResource::class;

    public function getTitle(): string
    {
        return "Buat Judul Praktikum";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_judul'] = Str::upper(Str::random(20));
        return $data;
    }
}
