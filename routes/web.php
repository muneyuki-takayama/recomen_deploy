<?php

Auth::routes();
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});

Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products', 'ProductController')->except(['index', 'show'])->middleware('auth')->middleware('auth');
Route::resource('products', 'ProductController')->only(['show']);
Route::prefix('products')->name('products.')->group(function () {
    Route::put('/{product}/like', 'ProductController@like')->name('like')->middleware('auth');
    Route::delete('/{product}/like', 'ProductController@unlike')->name('unlike')->middleware('auth');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
    Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser');

});
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');
Route::get('/tags/search/index', 'TagController@search')->name('tags.search');

Route::prefix('users')->name('users.')->group(function() {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
        Route::get('/{name}/edit', 'UserController@edit')->name('edit');
        Route::post('/{user}/update', 'UserController@update')->name('update');
    });
});
