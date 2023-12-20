<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = TeamResource::class;

    protected static ?string $title = "Edit Team Member";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
