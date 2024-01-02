<?php

namespace App\Filament\Resources\HeaderLinkResource\Pages;

use App\Filament\Resources\HeaderLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeaderLinks extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = HeaderLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
