<?php

namespace App\Filament\Resources\HeaderLinkResource\Pages;

use App\Filament\Resources\HeaderLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeaderLink extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    
    protected static string $resource = HeaderLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
