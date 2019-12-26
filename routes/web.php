<?php


Route::get('/', function () {

    return view('welcome');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['UserAuth']], function () {

    Route::get('/twitter/main', 'TwitterController@homeTwitter')->name('homeTwitter');

    //Add Profile

    Route::get('twitter/profile/', 'TwitterController@retrieveProfile')->name('profileview');
    Route::get('twitter/profile/{id}', 'TwitterController@retrieveProfile')->name('GetProfile');

    Route::post('twitter/profile', 'TwitterController@profileAdd')->name('profileAdd');

    //Add tweet data

    //Route::get('twitter/main/tweet','TwitterController@retrieveTweet')->name('tweetView');
    Route::post('twitter/main/tweet', 'TwitterController@postTweet')->name('tweetAdd');
    Route::get('twitter/fetch/tweet/{tweets_id}', 'TwitterController@fetchTweet')->name('fetchTweet');
    Route::post('twitter/main/tweet/update', 'TwitterController@updateTweet')->name('updateTweet');


    //fetch

    Route::get('fetch', 'TwitterController@fetch')->name('fetchprofile');


    //Route::get('fetch/{user_id}','TwitterController@fetch')->name('fetchprofile');

    //Like feature

    Route::post('add/like', 'TwitterController@LikeDislike')->name('likeData');

    //Route::get('fetch','TwitterController@fetchId')->name('fetchId');

    //Search

    Route::post('search', 'SearchController@Search')->name('searchTwitter');

    //Follow

    Route::post('follow/user', 'TwitterController@follow')->name('FollowUser');
    Route::post('unfollow/user', 'TwitterController@unFollow')->name('UnFollowUser');
    Route::get('get/followers', 'TwitterController@getFollowers')->name('GetFollowers');

    //Retweet

    Route::post('retweet/post', 'TwitterController@ReTweet')->name('ReTweet');

    //Comment

    Route::post('comment/post', 'TwitterController@comment')->name('comment');

    //Delete Tweet

    Route::delete('twitter/tweet/delete/{tweets_id}','TwitterController@destroy')->name('delete');


});
