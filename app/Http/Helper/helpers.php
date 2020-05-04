<?php

use Carbon\Carbon;
use App\Models\Friend;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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

if (!function_exists('formatUserBirthday')) {
    function formatDate($date, $format = 'd-m-Y')
    {
        try {
            $dateFormatted = Carbon::parse($date)->format($format);
        } catch (\Throwable $th) {
            Log::error($th);

            return '';
        }

        return $dateFormatted;
    }
}

if (!function_exists('getAvatar')) {
    function getAvatar($image)
    {
        $imagePath = '/theme/socialyte/img/default_avatar.jpg';

        if ($image) {
            $imagePath = asset('storage/images/users/' . $image);
        }

        return $imagePath;
    }
}

if (!function_exists('getCover')) {
    function getCover($image)
    {
        $imagePath = '/theme/socialyte/img/default_photo.png';

        if ($image) {
            $imagePath = asset('storage/images/users/' . $image);
        }

        return $imagePath;
    }
}

if (!function_exists('getTranslatedDate')) {
    function getTranslatedDate($date)
    {
        $currentLanguage = app()->getLocale();

        $newDate = new Carbon($date);

        if ($currentLanguage == 'vi') {
            return $newDate->translatedFormat('jS F, Y');
        } else {
            return $newDate->translatedFormat('F jS, Y');
        }
    }
}

if (!function_exists('strLimit')) {
    function strLimit($str, $length = 15)
    {
        return Str::limit($str, $length);
    }
}
