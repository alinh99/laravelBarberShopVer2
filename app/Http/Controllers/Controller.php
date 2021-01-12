<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // function kiểm tra user có đang đăng nhập hay ko
    function __construct()
    {
        $this->checkLogin();
    }

    function checkLogin(){
        if (Auth::check()) {
            view()->share('user_login',Auth::user());
        }
    }
}
