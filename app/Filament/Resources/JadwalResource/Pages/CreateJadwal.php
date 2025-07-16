<?php

namespace App\Filament\Resources\JadwalResource\Pages;

use App\Filament\Resources\JadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateJadwal extends CreateRecord
{
    protected static string $resource = JadwalResource::class;

    public function getTitle(): string
    {
        return "Buat Jadwal";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_jadwal'] = Str::upper(Str::random(20));
        return $data;
    }
}
