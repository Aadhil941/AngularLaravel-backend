<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function currentEmployeeId()
    {
        return Auth::user()->id;
    }

}