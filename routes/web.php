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


Auth::routes(['verify' => true]);

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

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

Route::middleware(['auth', 'verified', 'language'])->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('/settings/language', 'UserController@showLanguage')->name('user.showLanguage');
    Route::post('/settings/language/update', 'UserController@changeLanguage')->name('user.changeLanguage');
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

Route::resource('posts', 'PostController');
