<?php

namespace App\Providers;

use App\Models\HeaderInfo;
use App\Models\HeaderLink;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Blog')
                    ->icon('heroicon-o-pencil'),
                NavigationGroup::make()
                    ->label('Header')
                    ->icon('heroicon-o-rectangle-group'),
                NavigationGroup::make()
                    ->label('About us')
                    ->icon('heroicon-o-information-circle'),
                NavigationGroup::make()
                    ->label('Projects')
                    ->icon('heroicon-o-briefcase'),
                NavigationGroup::make()
                    ->label('Setting')
                    ->icon('heroicon-o-cog-6-tooth'),
            ]);
        });

        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Amber,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);
        

        view()->share('topbarInfos', HeaderInfo::all());

        view()->share('headerLinks', HeaderLink::all());
    }
}
