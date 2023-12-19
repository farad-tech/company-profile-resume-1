<?php

namespace App\Filament\Resources\CustomResource\Pages;

use App\Filament\Resources\CustomResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustom extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = CustomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
