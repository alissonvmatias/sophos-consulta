<?php

namespace App\Filament\Resources\AtendimentosResource\Pages;

use App\Filament\Resources\AtendimentosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAtendimentos extends EditRecord
{
    protected static string $resource = AtendimentosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
