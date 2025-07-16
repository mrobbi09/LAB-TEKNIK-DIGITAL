<?php

namespace App\Filament\Resources\TugasPendahuluanResource\Pages;

use App\Filament\Resources\TugasPendahuluanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTugasPendahuluans extends ListRecords
{
    protected static string $resource = TugasPendahuluanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "Tugas Pendahuluan";
    }
}
