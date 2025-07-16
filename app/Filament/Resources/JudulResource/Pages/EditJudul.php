<?php

namespace App\Filament\Resources\JudulResource\Pages;

use App\Filament\Resources\JudulResource;
use App\Models\Judul;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditJudul extends EditRecord
{
    protected static string $resource = JudulResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function (Judul $record) {
                    if ($record->modul) {
                        Storage::disk('public')->delete($record->modul);
                    }
                }),
        ];
    }

    public function getTitle(): string
    {
        return "Ubah Judul Praktikum";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
