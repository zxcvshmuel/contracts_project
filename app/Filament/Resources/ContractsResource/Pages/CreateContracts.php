<?php

namespace App\Filament\Resources\ContractsResource\Pages;

use App\Filament\Resources\ContractsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContracts extends CreateRecord
{
    protected static string $resource = ContractsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function getRedirectUrl():string
    {
        return $this->getResource()::getUrl('index');
    }
}
