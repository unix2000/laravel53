<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //自定义验证器 偶数
		Validator::extend('is_odd_string', function($attribute, $value, $parameters, $validator) {
            if(!empty($value) && (strlen($value) % 2) == 0){
                return true;
            }
			return false;
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
