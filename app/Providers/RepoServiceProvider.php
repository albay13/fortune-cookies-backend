<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\FortuneCookies\Repositories\Eloquent\AbstractRepo;
use App\FortuneCookies\Repositories\Eloquent\FortuneCookieRepo;
use App\FortuneCookies\Repositories\Interfaces\AbstractRepoInterface;
use App\FortuneCookies\Repositories\Interfaces\FortuneCookieRepoInterface;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AbstractRepoInterface::class, AbstractRepo::class);
        $this->app->bind(FortuneCookieRepoInterface::class, FortuneCookieRepo::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
