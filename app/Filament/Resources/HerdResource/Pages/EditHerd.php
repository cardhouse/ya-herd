<?php

namespace App\Filament\Resources\HerdResource\Pages;

use App\Filament\Resources\HerdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHerd extends EditRecord
{
    protected static string $resource = HerdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
