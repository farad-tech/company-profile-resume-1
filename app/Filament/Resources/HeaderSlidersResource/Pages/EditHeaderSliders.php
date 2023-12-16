<?php

namespace App\Filament\Resources\HeaderSlidersResource\Pages;

use App\Filament\Resources\HeaderSlidersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeaderSliders extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = HeaderSlidersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
