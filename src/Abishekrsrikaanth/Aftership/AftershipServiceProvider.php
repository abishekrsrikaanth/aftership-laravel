<?php namespace Abishekrsrikaanth\Aftership;

use Illuminate\Support\ServiceProvider;

class AftershipServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('abishekrsrikaanth/aftership-laravel');
        include __DIR__ . '/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['aftership-laravel'] = $this->app->share(function ($app) {
            return new Aftership();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('aftership-laravel');
    }

}
