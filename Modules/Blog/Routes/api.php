<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/blog', function (Request $request) {
//     return $request->user();
// });


// Route::group(['prefix' => 'blog'], function () {
//     // Route::post('post/', 'PostController@index');
// });
Route::prefix('blog')->group(function() {
    // Route::prefix('post')->group(function() {
    //     Route::get('/', 'PostController@index');
    //     Route::get('/{id}', 'PostController@show');
    // });

    Route::resource('posts', 'PostController');
    
    // Route::get('post/', 'PostController@index');
    Route::get('categories', 'TaxonomyController@index');
});