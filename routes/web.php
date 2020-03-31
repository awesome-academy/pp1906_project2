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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('page.auth.index');
})->name('auth.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/newsfeed', 'NewsFeedController@index')->name('newsfeed.home');

Route::get('/profile', 'ProfileController@index')->name('profile.home');

Route::get('/profile/about', 'ProfileController@about')->name('profile.about');

Route::get('/profile/friends', 'ProfileController@friends')->name('profile.friends');

Route::get('/profile/photos', 'ProfileController@photos')->name('profile.photos');

Route::get('/profile/videos', 'ProfileController@videos')->name('profile.videos');

Route::get('/settings', 'SettingController@personal')->name('setting.personal');
Route::get('/settings/password', 'SettingController@password')->name('setting.password');
Route::get('/settings/delete', 'SettingController@delete')->name('setting.delete');
Route::get('/settings/notifications', 'SettingController@notification')->name('setting.notification');
Route::get('/settings/requests', 'SettingController@request')->name('setting.request');
