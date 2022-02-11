<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

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
        Blade::directive('money', function ($amount) {
            return "<?php echo explode('.',number_format(round($amount), 2))[0].'/-'; ?>";
        });
        
        Blade::directive('onlymoney', function ($amount) {
            return "<?php echo explode('.',number_format(round($amount), 2))[0]; ?>";
        });
    }
}
