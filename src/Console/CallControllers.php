<?php

namespace App\Http\Controllers;

# Package
use Quinn\Login\LoginController;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CallController extends BaseController  
{
    /**
     *    Get Instagram from InstaGrab
     */
    public function register (Request $request)
    {   
        # get
        $regis = new LoginController();
        return $regis->register($request);;
    }

    public function login (Request $request)
    {   
        # get
        $regis = new LoginController();
        return $regis->login($request);;
    }
}