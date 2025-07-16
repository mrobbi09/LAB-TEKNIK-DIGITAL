<?php

namespace App\Filament\Resources\PrestasiResource\Pages;

use App\Filament\Resources\PrestasiResource;
use App\Models\Prestasi;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPrestasi extends EditRecord
{
    protected static string $resource = PrestasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function (Prestasi $record) {
                    if ($record->gambar_prestasi) {
                        Storage::disk('public')->delete($record->gambar_prestasi);
                    }
                }),
        ];
    }

    public function getTitle(): string
    {
        return "Ubah Prestasi";
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
