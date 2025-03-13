<?php

namespace App\Filament\Resources\HerdResource\Pages;

use App\Filament\Resources\HerdResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHerd extends CreateRecord
{
    protected static string $resource = HerdResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();

        return $data;
    }
}
