<?php

namespace App\Filament\Resources\HeaderSlidersResource\Pages;

use App\Filament\Resources\HeaderSlidersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeaderSliders extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = HeaderSlidersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
