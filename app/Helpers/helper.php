<?php

use Illuminate\Support\Facades\File;

if (!function_exists('set_avatar')) {
    function set_avatar(string $name, string $dir = 'users')
    {
        $path = public_path($dir);

        if (!File::isDirectory($path))
            File::makeDirectory($path, 0777, true, true);

        $backgrounds = config('settings.avatar_colors');
        $unique      = time() . rand(0, 999999);
        $path        = $dir . '/' . $unique . '.png';
        $rtl         = (strlen($name) != strlen(utf8_decode($name))) ? true : false;
        $ava         = new \Laravolt\Avatar\Avatar();
        $ava->applyTheme(['rtl' => $rtl]);
        $ava->create($name)->setFont(public_path('fonts/Tajawal-Medium.ttf'))->setBackground($backgrounds[random_int(0, 14)])->setDimension(220)->setFontSize(120)->save(public_path($path));
        return $path;
    }
}
