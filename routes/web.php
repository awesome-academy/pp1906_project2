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

// Route::get('/newsfeed', function () {
//     return view('pages.newsfeed.index');
// });

Route::get('/clear-cache', 'HomeController@clearViewCache')->name('cache.clear');

Route::middleware(['auth', 'verified', 'language'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');

    Route::get('/birthdays', 'HomeController@showTodayBirthdays')->name('birthdays.index');

    Route::get('/settings', 'UserController@showInformation')->name('user.showInformation');


    Route::post('/settings/update', 'UserController@updateInformation')->name('user.updateInformation');

    Route::get('/settings/language', 'UserController@showLanguage')->name('user.showLanguage');

    Route::get('/settings/password', 'UserController@showEditPassword')->name('user.showEditPassword');

    Route::put('/settings/password/update-password', 'UserController@updatePassword')->name('user.updatePassword');

    Route::post('/settings/language/update', 'UserController@updateLanguage')->name('user.updateLanguage');

    Route::get('/settings/notifications', 'NotificationController@showAllNotification')->name('notifications.showAllNotification');

    Route::get('/settings/friend-requests', 'FriendController@showAllNotification')->name('friend.showAllNotification');

    Route::get('/search-people', 'UserController@getSearchPeopleList')->name('people.search');

    Route::get('posts/{post}/get-images', 'PostController@getPostImages');

    Route::resource('posts', 'PostController');

    Route::get('/get-latest-posts', 'PostController@getLatestPost')->name('post.getLatest');

    Route::post('/get-latest-posts/remove-session', 'PostController@removePostsCountSession');

    Route::get('comments/load-more', 'CommentController@viewMoreComment')->name('comments.viewMoreComment');

    Route::post('comments/reacts', 'CommentController@reactComment')->name('comment.react');

    Route::resource('comments', 'CommentController');

    Route::post('comments/{comment}/replies', 'CommentController@replyComment')->name('comments.reply');

    Route::resource('reacts', 'ReactController');

    Route::post('{post}/share', 'PostController@share')->name('posts.share');

    Route::get('/notifications/show-notifications', 'NotificationController@getNotificationList')->name('notifications.getNotificationList');

    Route::post('/notifications/mark-all', 'NotificationController@markAllAsRead')->name('notifications.mark-all-as-read');

    Route::get('/friend-notifications/show-notifications', 'FriendController@getNotificationList')->name('friendNotifications.getNotificationList');

    Route::get('/activities/get-latest', 'ActivityController@getLatestActivity')->name('activity.getLatest');

    Route::get('/{username}', 'ProfileController@showProfile')->name('user.profile');

    Route::post('/{username}/image-profile', 'ProfileController@uploadProfileImage')->name('user.uploadProfileImage');

    Route::get('/{username}/friends', 'ProfileController@showFriends')->name('user.friends');

    Route::get('/{username}/friends/search', 'UserController@getSearchFriendList')->name('friends.search');

    Route::get('/{username}/photos', 'ProfileController@showPhotos')->name('user.photos');

    Route::get('/{username}/about', 'ProfileController@showAbout')->name('user.about');

    Route::post('/{username}/add-friend', 'FriendController@sendRequest')->name('friend.request');

    Route::post('/{username}/un-request', 'FriendController@removeRequest')->name('friend.unRequest');

    Route::post('/{username}/accept-friend', 'FriendController@acceptRequest')->name('friend.acceptRequest');

    Route::post('/{username}/reject-friend', 'FriendController@removeRequest')->name('friend.rejectRequest');

    Route::post('/{username}/un-friend', 'FriendController@removeFriend')->name('friend.unFriend');
});
