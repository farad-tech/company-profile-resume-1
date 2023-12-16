<?php

namespace App\Filament\Resources\HeaderInfoResource\Pages;

use App\Filament\Resources\HeaderInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeaderInfos extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = HeaderInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
