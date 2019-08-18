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

Route::prefix('blog')->group(function() {
    Route::put('posts/{id}/image', 'PostController@image');
    Route::put('posts/{id}/category', 'PostController@category');
    Route::put('posts/{id}/restore', 'PostController@restore');
    Route::get('posts/trash', 'PostController@trashList');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
});