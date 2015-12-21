<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ArticleRepository;
use Elasticsearch\ClientBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared(ArticleRepository::class, function() {
            $cb = ClientBuilder::create();
            $cb->setHosts([$_ENV['ES_HOST']]);
            $cb->setRetries(2);

            return new ArticleRepository($cb->build());
        });
    }
}
