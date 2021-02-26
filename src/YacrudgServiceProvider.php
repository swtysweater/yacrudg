<?php

namespace Swtysweater\Yacrudg;

use Swtysweater\Yacrudg\Console\Commands\Yacrudg;
use Swtysweater\Yacrudg\Console\Commands\YacrudgTest;
use Swtysweater\Yacrudg\Console\Commands\YacrudgRemove;
use Illuminate\Support\ServiceProvider;

class YacrudgServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->make('Swtysweater\Yacrudg\YacrudgController');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'yacrudg');
        $this->loadViewsFrom(__DIR__.'/resources/views/adminlte', 'adminlte');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->commands([
            Yacrudg::class,
            YacrudgTest::class,
            YacrudgRemove::class
        ]);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__.'/public' => public_path('swtysweater/yacrudg'),
        ], 'public');
        $this->publishes([
            __DIR__ .'/database/migrations/create_cruds_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_cruds_table.php'),
            // you can add any number of migrations here
          ], 'migrations');
        $this->publishes([
            __DIR__ . '/resources/stubs' =>
            resource_path('/swtysweater/yacrudg/stubs'
        )], 'stubs');
    }
}
