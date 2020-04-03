<?php

use Carbon\Carbon;

if (!function_exists('getCreatedFromTime')) {
    function getCreatedFromTime($post)
    {
        return Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans();
    }
}

if (!function_exists('getUpdatedFromTime')) {
    function getUpdatedFromTime($post)
    {
        return Carbon::createFromTimeStamp(strtotime($post->updated_at))->diffForHumans();
    }
}
