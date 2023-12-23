<?php

namespace App\Filament\Resources\SchemaResource\Pages;

use App\Filament\Resources\SchemaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchema extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = SchemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
