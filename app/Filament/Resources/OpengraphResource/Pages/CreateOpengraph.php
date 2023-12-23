<?php

namespace App\Filament\Resources\OpengraphResource\Pages;

use App\Filament\Resources\OpengraphResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOpengraph extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = OpengraphResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
