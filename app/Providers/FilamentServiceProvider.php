<?php

namespace App\Providers;

use App\Filament\Resources\ContractsResource;
use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\EventsResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;
use Ramnzys\FilamentEmailLog\Filament\Resources\EmailResource;
use Sgcomptech\FilamentTicketing\Filament\Resources\TicketResource;

class FilamentServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {

            Filament::registerViteTheme('resources/css/filament.css');

            Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
                if (auth()->user()->user_type === 0)
                {
                    return $builder->items([
                        NavigationItem::make('Dashboard')->label('לוח בקרה')->icon('heroicon-o-home')->activeIcon(
                            'heroicon-s-home'
                        )->isActiveWhen(fn(): bool => request()->routeIs('filament.pages.dashboard'))->url(
                            route('filament.pages.dashboard')
                        ),
                        NavigationItem::make('account')->label('הפרופיל שלי')->icon('heroicon-o-user')->activeIcon(
                            'heroicon-s-user'
                        )->url(route('filament.pages.my-profile')),
                        ...UserResource::getNavigationItems(),
                        ...CustomerResource::getNavigationItems(),
                        ...EventsResource::getNavigationItems(),
                        ...ContractsResource::getNavigationItems(),
                        ...EmailResource::getNavigationItems(),
                        ...TicketResource::getNavigationItems(),
                    ]);
                } else
                {
                    return $builder->items([
                        NavigationItem::make('Dashboard')->label('לוח בקרה')->icon('heroicon-o-home')->activeIcon(
                            'heroicon-s-home'
                        )->isActiveWhen(fn(): bool => request()->routeIs('filament.pages.dashboard'))->url(
                            route('filament.pages.dashboard')
                        ),
                        NavigationItem::make('account')->label('הפרופיל שלי')->icon('heroicon-o-user')->activeIcon(
                            'heroicon-s-user'
                        )->url(route('filament.pages.my-profile')),
                        ...CustomerResource::getNavigationItems(),
                        ...EventsResource::getNavigationItems(),
                        ...ContractsResource::getNavigationItems(),
                        ...TicketResource::getNavigationItems(),
                    ]);
                }

                return $builder;
            });

            Filament::registerUserMenuItems([
                userMenuItem::make()->label('הפרופיל שלי')->url(MyProfile::getUrl())->icon('heroicon-o-calendar'),
                userMenuItem::make()->label('לקוחות')->url(ContractsResource::getUrl())->icon('heroicon-o-collection'),
                userMenuItem::make()->label('אירועים')->url(EventsResource::getUrl())->icon('heroicon-o-calendar'),
                userMenuItem::make()->label('חוזים')->url(ContractsResource::getUrl())->icon('heroicon-o-calendar'),
            ]);

        });
    }
}
