<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeLocaleController extends Controller
{

    public function __invoke($lang)
    {

        if(in_array($lang , config('settings.locales',['ar','en']))){
            $this->lang_init($lang);
        }else{
            $default_lang = config('app.locale','en');
            $this->lang_init($default_lang);

        }
        if (!url()->previous()) {
            return url('/');
        }

        return back();
    }

    function lang_init(string $lang){
        if(auth()->check())
            auth()->user()->update(['lang'=>$lang]);
        else
            $this->session_lang_init($lang);
    }

    function session_lang_init(string $lang){
        if (session()->has('lang'))
            session()->forget('lang');
        session()->put('lang',$lang);
    }
}
