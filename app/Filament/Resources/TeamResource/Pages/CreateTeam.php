<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Filament\Resources\TeamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeam extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static string $resource = TeamResource::class;

    protected static ?string $title = "Create Team Member";

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make()
        ];
    }
}
