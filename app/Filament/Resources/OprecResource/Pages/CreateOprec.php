<?php

namespace App\Filament\Resources\OprecResource\Pages;

use App\Filament\Resources\OprecResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateOprec extends CreateRecord
{
    protected static string $resource = OprecResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_oprec'] = Str::upper(Str::random(20));
        $data['id_user'] = Auth::user()->id_user;
        return $data;
    }
}
