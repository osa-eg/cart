<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeThemeController extends Controller
{
    /**
     * @param $mood
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($mood)
    {
        if (session()->has('dark')) session()->forget('dark');
        if ($mood == '1') {
            session()->put('dark',true);
        }
        return back();
    }
}
