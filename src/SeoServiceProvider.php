<?php
namespace Nicxon\Seo;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class SeoServiceProvider extends ServiceProvider {
    public function register() {
        $this->mergeConfigFrom(__DIR__.'/config/nicxon-seo.php', 'nicxon-seo');
    }

    public function boot() {
        // Allow users to publish the config using: php artisan vendor:publish
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/nicxon-seo.php' => config_path('nicxon-seo.php'),
            ], 'nicxon-config');
        }
        
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'nicxon-seo');
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        Blade::directive('nicxonSeo', function () {
            return "<?php 
                // 1. Get all variables passed to the view via the View Factory
                \$viewData = Array::wrap(view()->getShared());
                \$allVars = array_merge(\$viewData, get_defined_vars());

                // 2. Find the first object that has our SEO trait/method
                \$model = collect(\$allVars)->first(function(\$var) {
                    return is_object(\$var) && method_exists(\$var, 'seo');
                });

                // 3. Render
                echo (new \Nicxon\Seo\SeoRenderer(\$model))->render(); 
            ?>";
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Nicxon\Seo\Console\Commands\SeoStatsCommand::class,
            ]);
        }
    }
}