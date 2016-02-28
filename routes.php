<?php

/****
 * @ ADMIN ROUTES
 */
Route::group(['middleware'=>['auth', 'ConfigMiddleware', 'AdminMiddleware', 'NavigationMiddleware'], 'prefix' => 'admin'], function(){
    // ADMIN HOMEPAGE
    Route::get('/', 'AdminController@index');
    Route::post('/', 'AdminController@store');
    Route::delete('/custom/{path}', 'AdminController@custom')->where('path', '.+');

    // detach menu content relations
    Route::delete('/menu/delete_content/{id}', 'MenuController@delete_content')->where('path', '.+');

    // SORTS
    Route::group(['prefix'=>'sort'], function(){
        Route::post('menus', 'MenuController@sort');
        Route::post('contents', 'ContentController@sort');
        Route::post('photos', 'PhotosController@sort');
        Route::post('links', 'LinksController@sort');
        Route::post('people', 'PeopleController@sort');
    });
    // RESOURCES
    Route::resource('menu', 'MenuController');
    Route::resource('contents', 'ContentController');
    Route::resource('banners', 'ContentController');
    Route::resource('galleries', 'ContentController');
    Route::resource('links', 'ContentController');
    Route::resource('people', 'ContentController');
    Route::resource('link', 'LinksController');
    Route::resource('photos', 'PhotosController');
    Route::resource('person', 'PeopleController');
    Route::resource('company', 'CompanyController');
    Route::resource('accountancy', 'AccountancyController');
    Route::resource('user', 'UserController');

    // SUBSCRIBE PACKAGE
    Route::get('subscribes', 'AdminController@subscribes');
    // DELETE ACCOUNTANCY FILE
    Route::delete('accountancy/file_delete/{path}', 'AccountancyController@FileDelete')->where('path', '.+');

    /**
     * @ ACCOUNTANCY FILE
     */
    Route::get('accountancy/file/{path}', function($path){
        $path = storage_path('app/accountancy/'.$path);
        $mime = \File::mimeType($path);
        return \Response::download($path, null, ['Content-type', $mime]);
    })->where('path', '.+');

});


/****
 * @ SITE ROUTES
 */
Route::group(['middleware'=>['ConfigMiddleware', 'NavigationMiddleware', 'SiteMiddleware']], function(){

    //PARALLAX OR NOT
    if(\File::exists(base_path('.config')) && json_decode(\File::get(base_path('.config')))->one_page) {
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