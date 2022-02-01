<?php
if(!function_exists('set_avatar')){
    function set_avatar(  string $name , string $dir = 'users') {
        $backgrounds   = config('settings.avatar_colors') ;
        $unique = time() . rand(0,999999);
        $path = $dir.'/'.$unique.'.png';
        $rtl = (strlen($name) != strlen(utf8_decode($name)))? true : false;
        $ava = new \Laravolt\Avatar\Avatar();
        $ava->applyTheme(['rtl'=>$rtl]);
        $ava->create($name)->setFont(public_path('fonts/Tajawal-Medium.ttf'))->setBackground($backgrounds[random_int(0,14)])->save(public_path($path));
        return $path;
    }
}
