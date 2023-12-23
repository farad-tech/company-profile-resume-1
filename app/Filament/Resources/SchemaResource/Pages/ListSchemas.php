<?php

namespace App\Filament\Resources\SchemaResource\Pages;

use App\Filament\Resources\SchemaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchemas extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    
    protected static string $resource = SchemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
