<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Pimple\Container;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // protected $request;
    // protected $response;
    // protected $container;

    public function __construct(Request $req,Response $res) {
        $this->request = $req;
//         $this->request = app()->request;
        $this->response = $res;
    }

    // public function __construct(Container $container)
    // {
    //     $this->container = $container;
    // }
    // public function __get($name)
    // {
    //     return $this->container[$name];
    // }
    // public static function getInstance(Container $container)
    // {
    //     return new static($container);
    // }
}
