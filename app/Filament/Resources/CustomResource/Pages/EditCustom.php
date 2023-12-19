<?php

namespace App\Filament\Resources\CustomResource\Pages;

use App\Filament\Resources\CustomResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustom extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = CustomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
