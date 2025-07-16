<?php

namespace App\Filament\Resources\TugasAkhirResource\Pages;

use App\Filament\Resources\TugasAkhirResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateTugasAkhir extends CreateRecord
{
    protected static string $resource = TugasAkhirResource::class;

    public function getTitle(): string
    {
        return "Buat Tugas Akhir";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_ta'] = Str::upper(Str::random(20));
        return $data;
    }
}
