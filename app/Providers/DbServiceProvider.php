<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class DbServiceProvider extends ServiceProvider {
	public function boot(){
		
	}
    public function register(){
        $this->app->bind(
            'App\Repositories\DbRepositoryInterface', 'App\Repositories\ItemRepository'
        );
    }
}