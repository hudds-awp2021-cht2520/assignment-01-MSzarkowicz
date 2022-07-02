<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocaleController extends Controller
{
    public function langChange($lang)
    {
        if (array_key_exists($lang, Config::get('app.languages'))) {
            Session::put('locale', $lang);
        }
        return Redirect::back();
    }
}
