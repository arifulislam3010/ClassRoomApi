<?php
namespace LaravelElms\ClassRoomApi;
use Illuminate\Support\ServiceProvider;
class ClassRoomApiServiceProvider extends ServiceProvider{
    
    
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
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/routes/client.php');
        $this->loadViewsFrom(__DIR__.'/views', 'contact');
    }
}