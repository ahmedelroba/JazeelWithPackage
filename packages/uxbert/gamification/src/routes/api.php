<?php



Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/leaderboard', 'middleware' => 'api'], function () {
    Route::post('create', 'LeaderBoardController@store');
    Route::post('updated', 'LeaderBoardController@update');
    Route::post('delete', 'LeaderBoardController@destroy');
    Route::post('list', 'LeaderBoardController@index');
    Route::post('get_users_of', 'LeaderBoardController@getUsersOfLeaderboard');
    Route::post('find', 'LeaderBoardController@show');
    Route::post('search', 'LeaderBoardController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/actions', 'middleware' => 'api'], function () {
    Route::post('create', 'ActionController@store');
    Route::post('updated', 'ActionController@update');
    Route::post('delete', 'ActionController@destroy');
    Route::post('list', 'ActionController@index');
    Route::post('find', 'ActionController@show');
    Route::post('search', 'ActionController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/rewards', 'middleware' => 'api'], function () {
    Route::post('create', 'RewardsController@store');
    Route::post('updated', 'RewardsController@update');
    Route::post('delete', 'RewardsController@destroy');
    Route::post('list', 'RewardsController@index');
    Route::post('find', 'RewardsController@show');
    Route::post('search', 'RewardsController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/rewards_history', 'middleware' => 'api'], function () {
    Route::post('create', 'RewardsHistoryController@store');
    Route::post('updated', 'RewardsHistoryController@update');
    Route::post('delete', 'RewardsHistoryController@destroy');
    Route::post('list', 'RewardsHistoryController@index');
    Route::post('find', 'RewardsHistoryController@show');
    Route::post('search', 'RewardsHistoryController@search');
});

Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api/sponsors', 'middleware' => 'api'], function () {
    Route::post('create', 'SponsersController@store');
    Route::post('updated', 'SponsersController@update');
    Route::post('delete', 'SponsersController@destroy');
    Route::post('list', 'SponsersController@index');
    Route::post('find', 'SponsersController@show');
    Route::post('search', 'SponsersController@search');
});


Route::group(['namespace' => 'Uxbert\Gamification\Http\Controllers\API', 'prefix' => 'api', 'middleware' => 'api'], function () {
    /*
    |--------------------------------------------------------------------------
    | Brands API Routes
    |--------------------------------------------------------------------------
    */
    Route::post('users/get_leaderboards', 'LeaderBoardController@getLeaderboardsOfUser');

    Route::post('create_new_brand', 'JazeelApiController@create_new_brand');
    Route::post('create_new_user', 'JazeelApiController@create_new_user');
    Route::post('add_new_brand_action', 'JazeelApiController@add_brand_action');
    Route::post('brand_actions_list', 'JazeelApiController@getting_all_brand_action');
    Route::post('add_action_for_user', 'JazeelApiController@add_new_action_for_brand_user');
    Route::post('show_all_points_of_user', 'JazeelApiController@show_user_points');
    Route::post('show_all_points_of_user_history', 'JazeelApiController@show_user_points_history');
    Route::post('top_users_have_points', 'JazeelApiController@top_users_have_points');
    Route::post('top_users_got_points', 'JazeelApiController@top_users_got_points');
    Route::post('top_users_by_brand_action', 'JazeelApiController@top_users_by_brand_action');
});
