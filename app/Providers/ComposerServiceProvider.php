<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Menu;

class ComposerServiceProvider extends ServiceProvider
{
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
        $this->composerFooterNavigation();
        $this->composerMainNavigation();
    }

    private function composerFooterNavigation() {
        
        view()->composer('layouts.footer', 'App\Http\Composers\FooterNavigationComposer');
    }

    private function composerMainNavigation()
    {
        view()->composer('layouts.navbar', 'App\Http\Composers\MainNavigationComposer');
    }
}
