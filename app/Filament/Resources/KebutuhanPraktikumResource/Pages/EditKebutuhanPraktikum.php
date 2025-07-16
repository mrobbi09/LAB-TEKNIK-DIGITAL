<?php

namespace App\Filament\Resources\KebutuhanPraktikumResource\Pages;

use App\Filament\Resources\KebutuhanPraktikumResource;
use App\Models\KebutuhanPraktikum;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditKebutuhanPraktikum extends EditRecord
{
    protected static string $resource = KebutuhanPraktikumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function (KebutuhanPraktikum $record) {
                    if ($record->lembar_asistensi) {
                        Storage::disk('public')->delete($record->lembar_asistensi);
                    }
                    if ($record->lembar_tp) {
                        Storage::disk('public')->delete($record->lembar_tp);
                    }
                    if ($record->format_margin) {
                        Storage::disk('public')->delete($record->format_margin);
                    }
                    if ($record->format_laprak) {
                        Storage::disk('public')->delete($record->format_laprak);
                    }
                    if ($record->format_absen) {
                        Storage::disk('public')->delete($record->format_absen);
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
