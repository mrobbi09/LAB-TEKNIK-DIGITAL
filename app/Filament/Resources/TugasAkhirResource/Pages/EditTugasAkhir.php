<?php

namespace App\Filament\Resources\TugasAkhirResource\Pages;

use App\Filament\Resources\TugasAkhirResource;
use App\Models\TugasAkhir;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditTugasAkhir extends EditRecord
{
    protected static string $resource = TugasAkhirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function (TugasAkhir $record) {
                    if ($record->soal_ta) {
                        Storage::disk('public')->delete($record->soal_ta);
                    }
                }),
        ];
    }

    public function getTitle(): string
    {
        return "Ubah Tugas Akhir";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
