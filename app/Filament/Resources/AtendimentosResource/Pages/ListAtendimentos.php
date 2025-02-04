<?php

namespace App\Filament\Resources\AtendimentosResource\Pages;

use App\Filament\Resources\AtendimentosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAtendimentos extends ListRecords
{
    protected static string $resource = AtendimentosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
