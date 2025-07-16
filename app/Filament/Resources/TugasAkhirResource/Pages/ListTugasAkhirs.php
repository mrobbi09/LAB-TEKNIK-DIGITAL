<?php

namespace App\Filament\Resources\TugasAkhirResource\Pages;

use App\Filament\Resources\TugasAkhirResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTugasAkhirs extends ListRecords
{
    protected static string $resource = TugasAkhirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "Tugas Akhir";
    }
}
