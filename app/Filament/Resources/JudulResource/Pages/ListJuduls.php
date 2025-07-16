<?php

namespace App\Filament\Resources\JudulResource\Pages;

use App\Filament\Resources\JudulResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJuduls extends ListRecords
{
    protected static string $resource = JudulResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "Judul Praktikum";
    }
}
