<?php

namespace App\Filament\Resources\KebutuhanPraktikumResource\Pages;

use App\Filament\Resources\KebutuhanPraktikumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKebutuhanPraktikums extends ListRecords
{
    protected static string $resource = KebutuhanPraktikumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
