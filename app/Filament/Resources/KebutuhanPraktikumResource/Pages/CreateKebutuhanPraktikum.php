<?php

namespace App\Filament\Resources\KebutuhanPraktikumResource\Pages;

use App\Filament\Resources\KebutuhanPraktikumResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateKebutuhanPraktikum extends CreateRecord
{
    protected static string $resource = KebutuhanPraktikumResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_kbp'] = Str::upper(Str::random(20));
        return $data;
    }
}
