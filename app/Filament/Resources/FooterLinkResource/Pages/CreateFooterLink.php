<?php

namespace App\Filament\Resources\FooterLinkResource\Pages;

use App\Filament\Resources\FooterLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFooterLink extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = FooterLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
