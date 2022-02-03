<?php

if(!function_exists('success')){
    function success( $msg = null,  $type = 'success'){
        if(!$msg) $msg = __('alerts.success');
        \session()->flash($type,$msg);
    }
}
if(!function_exists('sent')){
    function sent($msg = null,   $type = 'success'){
        if(!$msg) $msg = __('alerts.sent');
        \session()->flash($type,$msg);
    }
}
if(!function_exists('saved')){
    function saved( $msg = null,  $type = 'success'){
        if(!$msg) $msg = __('alerts.saved');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('failed')){
    function failed( $msg = null,  $type = 'error'){
        if(!$msg) $msg = __('alerts.error');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('updated')){
    function updated( $msg = null, $type = 'success'){
        if(!$msg) $msg = __('alerts.updated');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('deleted')){
    function deleted($msg = null,   $type = 'success'){
        if(!$msg) $msg = __('alerts.deleted');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('cant_deleted')){
    function cant_deleted( $msg = null,  $type = 'error'){
        if(!$msg) $msg = __('alerts.cant_deleted');
        \session()->flash($type,$msg);
    }
}
