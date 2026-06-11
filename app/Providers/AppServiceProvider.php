<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Aboutus;
use App\Helper\MailHelper;

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
        MailHelper::setMailConfig();

        View::composer(['*'],function($view){
            $view->with('siteSetting',Aboutus::find(1));
        });
        Paginator::useBootstrapFive();
      
    }
}
