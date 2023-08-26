<?php

namespace App\Providers;

use App\Models\ContactRequest;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;
use Statview\Satellite\Statview;
use Statview\Satellite\Widgets\Widget;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Statview::registerWidgets(function () {
            return [
                Widget::make('total_contact_requests')
                    ->title('Total contact requests')
                    ->value(ContactRequest::count())
                    ->description('The amount of contact requests send'),

            ];
        });
    }
}
