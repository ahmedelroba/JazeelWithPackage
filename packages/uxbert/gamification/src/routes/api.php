<?php

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/leaderboard', 'middleware' => 'api'], function () {
    Route::post('create', 'LeaderBoardController@store');
    Route::post('update', 'LeaderBoardController@update');
    Route::post('delete', 'LeaderBoardController@destroy');
    Route::post('list', 'LeaderBoardController@index');
    // Route::post('get_users_of_leaderboard', 'LeaderBoardController@getUsersOfLeaderboard');
    Route::post('find', 'LeaderBoardController@find');
    Route::post('search', 'LeaderBoardController@search');
    Route::post('fake_records', 'LeaderBoardController@addFackRecords');
    Route::post('close', 'LeaderBoardController@closeLeaderboards');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/actions', 'middleware' => 'api'], function () {
    Route::post('create', 'ActionController@store');
    Route::post('update', 'ActionController@update');
    Route::post('delete', 'ActionController@destroy');
    Route::post('list', 'ActionController@index');
    Route::post('find', 'ActionController@find');
    Route::post('search', 'ActionController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/rewards', 'middleware' => 'api'], function () {
    Route::post('create', 'RewardsController@store');
    Route::post('update', 'RewardsController@update');
    Route::post('delete', 'RewardsController@destroy');
    Route::post('list', 'RewardsController@index');
    Route::post('find', 'RewardsController@find');
    Route::post('search', 'RewardsController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/rewards_history', 'middleware' => 'api'], function () {
    Route::post('create', 'RewardsHistoryController@store');
    Route::post('update', 'RewardsHistoryController@update');
    Route::post('delete', 'RewardsHistoryController@destroy');
    Route::post('list', 'RewardsHistoryController@index');
    Route::post('find', 'RewardsHistoryController@find');
    Route::post('search', 'RewardsHistoryController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/sponsors', 'middleware' => 'api'], function () {
    Route::post('create', 'SponsersController@store');
    Route::post('update', 'SponsersController@update');
    Route::post('delete', 'SponsersController@destroy');
    Route::post('list', 'SponsersController@index');
    Route::post('find', 'SponsersController@find');
    Route::post('search', 'SponsersController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/users', 'middleware' => 'api'], function () {
    Route::post('create',               'UsersController@create_new_user');
    Route::post('add_point',            'UsersController@add_points');
    Route::post('actions_records',      'UsersController@action_records');
    Route::post('get_leaderboards',     'UsersController@getLeaderboards');
    Route::post('find_leaderboard',     'UsersController@findLeaderboard');
    Route::post('get_balance',          'UsersController@getBalance');
    Route::post('get_featured_ranks',   'UsersController@featuredRanks');
});


Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api', 'middleware' => 'api'], function () {
    /*
    |--------------------------------------------------------------------------
    | Brands API Routes
    |--------------------------------------------------------------------------
    */

    Route::post('create_new_brand', 'JazeelApiController@create_new_brand');
    Route::post('add_new_brand_action', 'JazeelApiController@add_brand_action');
    Route::post('brand_actions_list', 'JazeelApiController@getting_all_brand_action');

    Route::post('show_all_points_of_user', 'JazeelApiController@show_user_points');
    Route::post('top_users_have_points', 'JazeelApiController@top_users_have_points');
    Route::post('top_users_got_points', 'JazeelApiController@top_users_got_points');
    Route::post('top_users_by_brand_action', 'JazeelApiController@top_users_by_brand_action');
});
