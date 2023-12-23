<?php

namespace App\Filament\Resources\SchemaResource\Pages;

use App\Filament\Resources\SchemaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSchema extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = SchemaResource::class;

    protected function getHeaderActions() : array 
    {
        return [
            Actions\LocaleSwitcher::make()
        ];
    }
}
