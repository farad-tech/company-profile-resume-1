<?php

namespace App\Filament\Resources\HeaderLinkResource\Pages;

use App\Filament\Resources\HeaderLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeaderLink extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = HeaderLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
