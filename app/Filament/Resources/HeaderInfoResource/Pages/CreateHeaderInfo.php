<?php

namespace App\Filament\Resources\HeaderInfoResource\Pages;

use App\Filament\Resources\HeaderInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeaderInfo extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = HeaderInfoResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
