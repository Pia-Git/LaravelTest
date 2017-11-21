<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;

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
    	
    	//Variable $archives sind auf jeder Seite vorhanden, wo die Sidebar geladen wird!
    	view()->composer('layouts.sidebar', function($view){
    		
    		$view->with('archives', \App\Post::archives());
    		
    		$view->with('tags', \App\Tag::has('posts')->pluck('name'));
    		
    	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //for example Singleton Classes
        /*$this->app->singleton('App\Billing\Stripe', function(){
        	return new \App\Billing\Stripe(config('services.stripe.secret'));
        });*/
    }
}
