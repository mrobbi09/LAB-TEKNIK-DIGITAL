<?php

namespace App\Filament\Resources\OprecResource\Pages;

use App\Filament\Resources\OprecResource;
use App\Models\Oprec;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditOprec extends EditRecord
{
    protected static string $resource = OprecResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function (Oprec $record) {
                    if ($record->cv) {
                        Storage::disk('public')->delete($record->cv);
                    }
                    if ($record->transkrip) {
                        Storage::disk('public')->delete($record->transkrip);
                    }
                }),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
