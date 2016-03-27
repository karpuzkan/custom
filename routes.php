<?php

/****
 * @ SITE ROUTES
 */
Route::group(['middleware'=>['ConfigMiddleware', 'NavigationMiddleware', 'SiteMiddleware']], function(){

    //PARALLAX OR NOT
    if(\File::exists(storage_path('.config')) && json_decode(\File::get(storage_path('.config')))->one_page) {
        // Parallax Eng
        Route::get('/eng', 'SiteController@Parallax');
        // Parallax
        Route::get('/', 'SiteController@Parallax');
        // Any Other Link
        Route::get('{path}', 'SiteController@Parallax')->where('path', '.+');
    } else
    {
        //Lang Check
        Route::get('/tr', 'SiteController@Lang');
        Route::get('/home', 'SiteController@Lang');
        // Home Page
        Route::get('/eng', 'SiteController@index');
        Route::get('/', 'SiteController@index');
        // Content Pages
        Route::get('{path}', 'SiteController@content')->where('path', '.+');
        // Send Message
        Route::post('/message', 'SiteController@message');
    }
});