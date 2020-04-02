<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/newsfeed', function () {
    return view('pages.newsfeed.index');
});

Route::get('/profile', function () {
    return view('pages.profile.timeline.index');
});

Route::get('/profile/about', function () {
    return view('pages.profile.about.index');
});

Route::get('/profile/friends', function () {
    return view('pages.profile.friends.index');
});

Route::get('/profile/photos', function () {
    return view('pages.profile.photos.index');
});

Route::get('/profile/videos', function () {
    return view('pages.profile.videos.index');
});

Route::get('/settings', function () {
    return view('pages.settings.personal.index');
});

Route::get('/settings/password', function () {
    return view('pages.settings.password.index');
});

Route::get('/settings/notifications', function () {
    return view('pages.settings.notification.index');
});

Route::get('/settings/requests', function () {
    return view('pages.settings.request.index');
});
