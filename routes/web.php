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


Route::get('/profile/about', function () {
    return view('pages.profile.about.index');
});

Route::get('/profile/photos', function () {
    return view('pages.profile.photos.index');
});

Route::get('/profile/videos', function () {
    return view('pages.profile.videos.index');
});

Route::middleware(['auth', 'verified', 'language'])->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('/settings', 'UserController@showInformation')->name('user.showInformation');

    Route::post('/settings/update', 'UserController@updateInformation')->name('user.updateInformation');

    Route::get('/settings/language', 'UserController@showLanguage')->name('user.showLanguage');

    Route::post('/settings/language/update', 'UserController@updateLanguage')->name('user.updateLanguage');

    Route::get('/settings/notifications', 'NotificationController@showAllNotification')->name('notifications.showAllNotification');

    Route::get('/{username}', 'ProfileController@showProfile')->name('user.profile');

    Route::post('/{username}/image-profile', 'ProfileController@uploadProfileImage')->name('user.uploadProfileImage');

    Route::get('/{username}/friends', 'ProfileController@showFriends')->name('user.friends');

    Route::post('/{username}/add-friend', 'FriendController@sendRequest')->name('friend.request');

    Route::post('/{username}/un-request', 'FriendController@removeRequest')->name('friend.unRequest');

    Route::post('/{username}/accept-friend', 'FriendController@acceptRequest')->name('friend.acceptRequest');

    Route::post('/{username}/reject-friend', 'FriendController@removeRequest')->name('friend.rejectRequest');

    Route::resource('posts', 'PostController');

    Route::resource('comments', 'CommentController');
    Route::post('comments/reacts', 'CommentController@reactComment')->name('comment.react');;

    Route::resource('reacts', 'ReactController');

    Route::post('{post}/share', 'PostController@share')->name('posts.share');

    Route::get('/notifications/show-notifications', 'NotificationController@getNotificationList')->name('notifications.getNotificationList');

    Route::get('/notification/{notification}/show-post', 'NotificationController@showNotificationPost')->name('notifications.show-post');

    Route::post('/notifications/mark-all', 'NotificationController@markAllAsRead')->name('notifications.mark-all-as-read');
});

Route::get('/settings/password', function () {
    return view('pages.settings.password.index');
});

Route::get('/settings/requests', function () {
    return view('pages.settings.request.index');
});
