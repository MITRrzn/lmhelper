<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
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
        Validator::extend('alpha_spaces', function ($attribute, $value) {

            // This validation will only accept alpha and spaces. 
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('phone_num', function ($attribute, $value) {
            //validation phone number in mask +7(XXX)XXX-XX-XX
            $regex = '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/m';

            return preg_match($regex, $value);
        });
    }
}
