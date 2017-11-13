<?php

namespace Pandeptwidyaop\Alert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class Alert extends Controller
{
    public static function create($type,$message,$icon = null)
    {
        Session::flash('alert',['type' => $type, 'message' => $message,'icon' => $icon]);
    }

    public static function show()
    {
        $alert = config('alert.template');
        return strtr($alert,[
            '{type}' => Alert::getType(),
            '{message}' => Alert::getMessage(),
            '{icon}' => Alert::getIcon()
        ]);
    }

    public static function have()
    {
        return Session::has('alert');
    }

    public static function getType()
    {
        return Session::get('alert')['type'];
    }

    public static function getMessage()
    {
        return Session::get('alert')['message'];
    }

    public static function getIcon()
    {
        return Session::get('alert')['icon'];
    }
}
