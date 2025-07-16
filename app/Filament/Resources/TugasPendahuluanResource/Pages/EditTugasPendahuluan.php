<?php

namespace App\Filament\Resources\TugasPendahuluanResource\Pages;

use App\Filament\Resources\TugasPendahuluanResource;
use App\Models\TugasPendahuluan;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditTugasPendahuluan extends EditRecord
{
    protected static string $resource = TugasPendahuluanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function (TugasPendahuluan $record) {
                    if ($record->soal_tp) {
                        Storage::disk('public')->delete($record->soal_tp);
                    }
                }),
        ];
    }

    public function getTitle(): string
    {
        return "Ubah Tugas Pendahuluan";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
