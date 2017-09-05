<?php

namespace App\Providers;

use App\Comment;
use App\Inbox;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.main', function ($view){
            $unSeenComments = Comment::whereStatus('not-checked')->count();
            $unSeenInboxes = Inbox::whereSeenBy(null)->count();

            $view->with([
                'unSeenComments' => $unSeenComments,
                'unSeenInboxes' => $unSeenInboxes
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
