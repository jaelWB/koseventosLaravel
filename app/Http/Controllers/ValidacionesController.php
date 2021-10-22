<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ValidacionesController extends Controller
{
    public static function soloADMIN(){
        $user = Auth::user();
        if($user->rol !== 'adm'){
            return abort(404);
        }else{
            return true;
        }
    }

    public static function noNegocio(){
        $user = Auth::user();
        if($user->rol === 'negocios'){
            return abort(404);
        }else{
            return true;
        }
    }

    public static function isMobile(){
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}
