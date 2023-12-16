<?php

namespace App\Filament\Resources\HeaderSlidersResource\Pages;

use App\Filament\Resources\HeaderSlidersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeaderSliders extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = HeaderSlidersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
