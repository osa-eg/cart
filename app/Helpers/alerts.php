<?php

if(!function_exists('success')){
    function success( $type = 'success', $msg= null){
        if(!$msg) $msg = __('alerts.success');
        \session()->flash($type,$msg);
    }
}
if(!function_exists('sent')){
    function sent( $type = 'success', $msg= null){
        if(!$msg) $msg = __('alerts.sent');
        \session()->flash($type,$msg);
    }
}
if(!function_exists('saved')){
    function saved( $type = 'success', $msg= null){
        if(!$msg) $msg = __('alerts.saved');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('failed')){
    function failed( $type = 'error', $msg = null){
        if(!$msg) $msg = __('alerts.error');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('updated')){
    function updated( $type = 'success', $msg = null){
        if(!$msg) $msg = __('alerts.updated');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('deleted')){
    function deleted( $type = 'success', $msg = null){
        if(!$msg) $msg = __('alerts.deleted');
        \session()->flash($type,$msg);
    }
}

if(!function_exists('cant_deleted')){
    function cant_deleted( $type = 'error', $msg = null){
        if(!$msg) $msg = __('alerts.cant_deleted');
        \session()->flash($type,$msg);
    }
}
