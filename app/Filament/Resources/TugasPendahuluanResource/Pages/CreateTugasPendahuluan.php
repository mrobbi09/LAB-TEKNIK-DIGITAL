<?php

namespace App\Filament\Resources\TugasPendahuluanResource\Pages;

use App\Filament\Resources\TugasPendahuluanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateTugasPendahuluan extends CreateRecord
{
    protected static string $resource = TugasPendahuluanResource::class;

    public function getTitle(): string
    {
        return "Buat Tugas Pendahuluan";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_tp'] = Str::upper(Str::random(20));
        return $data;
    }
}
