<?php

namespace App\Filament\Resources\OpengraphResource\Pages;

use App\Filament\Resources\OpengraphResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpengraph extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = OpengraphResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
