<?php

namespace App\Providers;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
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

        // Filament::serving(function () {
        //     Filament::registerViteTheme('resources/css/filament.css');
        //     Filament::registerNavigationItems([
        //         NavigationItem::make('Register new company')
        //             ->url('/users/create')
        //             ->icon('heroicon-o-bars-4')
        //             ->sort(3)
        //             ->label(__(key: 'register new company')),
        //     ]);
        // });

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $locale = app()->getLocale();
    
            $labels = [
                'ku' => $locale === 'ku' ? 'کوردی' : 'Kurdish',  
                'en' => $locale === 'ku' ? 'ئینگلیزی' : 'English', 
                'ar' => $locale === 'ku' ? 'عەرەبی' : 'Arabic', 
            ];
            
            $switch
                ->locales(['ku', 'en', 'ar'])
                ->circular()
                ->visible(outsidePanels: true)
                ->labels($labels); 
        });
        
    }
}
