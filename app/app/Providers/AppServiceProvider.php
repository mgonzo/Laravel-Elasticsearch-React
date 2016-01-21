<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Elasticsearch\ClientBuilder;
use App\Repositories\ArticleRepository;
use App\Repositories\ChannelRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cb = ClientBuilder::create();
        $cb->setHosts([$_ENV['ES_HOST']]);
        $cb->setRetries(2);
        $channelRepo = new ChannelRepository($cb->build());
        $channels = $channelRepo->all();

        $simple_arr = [];
        foreach($channels as $chan) {
            $simple_arr[] = [
                $chan['url'],
                $chan['name']
            ];
        }

        view()->share('channels', $simple_arr);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $cb = ClientBuilder::create();
        $cb->setHosts([$_ENV['ES_HOST']]);
        $cb->setRetries(2);
        $client = $cb->build();

        $this->app->bindShared(ArticleRepository::class, function() use ($client) {
            return new ArticleRepository($client);
        });

        $this->app->bindShared(ChannelRepository::class, function() use ($client) {
            return new ChannelRepository($client);
        });
    }
}
