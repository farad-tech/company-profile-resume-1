<?php

namespace App\Providers;

use App\Models\custom;
use App\Models\FooterLink;
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

        $footerText = custom::where('title', 'footer-text')->first()->content;
        $footerText = [
            'text' => $footerText['text']
        ];

        $footerContactWays = custom::where('title', 'footer-contact')->first()->content;
        $footerContact = [
            "address"   => $footerContactWays['Address'],
            "phone"     => $footerContactWays['phone'],
            "email"     => $footerContactWays['email'],
            "twitter"   => $footerContactWays['twitter'],
            "facebook"  => $footerContactWays['facebook'],
            "linkedin"  => $footerContactWays['linkedIn'],
            "instagram" => $footerContactWays['instagram'],
        ];

        $quickLinkTitle = custom::where('title', 'quick-link-title')->first()->content['quick-link-title'];
        $quickLinkTitle = [
            'quickLinkTitle' => $quickLinkTitle
        ];

        $popularLinkTitle = custom::where('title', 'popular-link-title')->first()->content['popular-link-title'];
        $popularLinkTitle = [
            'popularLinkTitle' => $popularLinkTitle
        ];

        $copyRight = custom::where('title', 'copy-right')->first()->content['copy-right'];
        $copyRight = [
            'copyRight' => $copyRight
        ];

        $footer = [];
        $footer = array_merge($footer, $footerText);
        $footer = array_merge($footer, $footerContact);
        $footer = array_merge($footer, $quickLinkTitle);
        $footer = array_merge($footer, $popularLinkTitle);
        $footer = array_merge($footer, $copyRight);

        $footer = (object) $footer;

        view()->share('topbarInfos', HeaderInfo::all());
        view()->share('headerLinks', HeaderLink::all());
        view()->share('footer_public', $footer);
        view()->share('footer_quick_links', FooterLink::where('group', 'quick-links')->get());
        view()->share('footer_popular_links', FooterLink::where('group', 'popular-links')->get());
    }
}
