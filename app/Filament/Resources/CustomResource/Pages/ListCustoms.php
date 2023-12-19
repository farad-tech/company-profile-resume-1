<?php

namespace App\Filament\Resources\CustomResource\Pages;

use App\Filament\Resources\CustomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustoms extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = CustomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
