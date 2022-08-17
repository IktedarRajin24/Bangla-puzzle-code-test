<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userBlogControllerAPI;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blogs/viewBlog',[userBlogControllerAPI::class,'viewBlog']);
Route::post('/createBlog', [userBlogControllerAPI::class, 'createBlog']);
Route::delete('/deleteBlog/{id}', [userBlogControllerAPI::class, 'deleteBlog']);
Route::put('/updateBlog/{id}', [userBlogControllerAPI::class, 'updateBlog']);