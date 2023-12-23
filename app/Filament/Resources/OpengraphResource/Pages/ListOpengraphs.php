<?php

namespace App\Filament\Resources\OpengraphResource\Pages;

use App\Filament\Resources\OpengraphResource;
use Filament\Actions;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Pages\ListRecords;

class ListOpengraphs extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = OpengraphResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
