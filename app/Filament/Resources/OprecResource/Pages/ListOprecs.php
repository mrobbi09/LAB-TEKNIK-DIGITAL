<?php

namespace App\Filament\Resources\OprecResource\Pages;

use App\Filament\Resources\OprecResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOprecs extends ListRecords
{
    protected static string $resource = OprecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
