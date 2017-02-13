<?php
namespace App\Providers;
use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;
class AnnotationsServiceProvider extends ServiceProvider {
    protected $scanEvents = [];
    protected $scanRoutes = [
        App\Http\Controllers\AnnotationsController::class,
    ];
    protected $scanModels = [];
    //$scanWhenLocal和$scanControllers必须同时设置为true
    protected $scanWhenLocal = true;
    protected $scanControllers = true;
    protected $scanEverything = false;

}
