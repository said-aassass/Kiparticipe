<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        Blade::directive('cutText', function ($text) {
            return 
            "<?php 
            \$text = $text;
            \$length = 70;
            if(strlen(\$text)>\$length){
                while(!preg_match('/[a-z]/', \$text[\$length])){
                    \$length--;
                }
                $text = substr(\$text, 0, \$length) . '...';
            }
            echo $text 
            ?>";
        });
    }
}
