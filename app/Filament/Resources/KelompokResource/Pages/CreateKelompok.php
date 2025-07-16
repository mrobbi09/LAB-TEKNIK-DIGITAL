<?php

namespace App\Filament\Resources\KelompokResource\Pages;

use App\Filament\Resources\KelompokResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateKelompok extends CreateRecord
{
    protected static string $resource = KelompokResource::class;

    public function getTitle(): string
    {
        return "Buat Kelompok";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_kelompok'] = Str::upper(Str::random(20));
        return $data;
    }
}
