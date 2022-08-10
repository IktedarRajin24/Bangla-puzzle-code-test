<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthUsers;
use App\Http\Controllers\userBlogs;

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

Route::get('/', [UsersController::class, 'home'])->name('home');
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, 'loginSubmitted'])->name('login');
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'registerSubmitted'])->name('register');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::get('/userEdit/{id}/{Name}',[AuthUsers::class,'userEdit'])->name('userEdit')->middleware('verifyUser');
Route::post('/userEdit',[AuthUsers::class,'userEditSubmitted'])->name('userEdit')->middleware('verifyUser');

Route::get('/userDelete/{id}',[AuthUsers::class,'userDelete'])->name('userDelete')->middleware('verifyUser');

Route::get('/dashboard', [AuthUsers::class, 'dashboard'])->name('users.dashboard')->middleware('verifyUser');
Route::get('/profile', [AuthUsers::class, 'profile'])->name('users.profile')->middleware('verifyUser');

Route::get('/createBlog', [userBlogs::class, 'createBlogs'])->name('blogs.createBlog')->middleware('verifyUser');
Route::post('/createBlog', [userBlogs::class, 'createBlogsSubmitted'])->name('blogs.createBlog')->middleware('verifyUser');

Route::get('/viewBlog', [userBlogs::class, 'viewBlog'])->name('blogs.viewBlog')->middleware('verifyUser');

Route::get('/commentOnBlog/{id}', [userBlogs::class, 'commentOnBlog'])->name('blogs.commentOnBlog')->middleware('verifyUser');
Route::post('/commentOnBlog', [userBlogs::class, 'commentOnBlogSubmitted'])->name('blogs.commentOnBlog')->middleware('verifyUser');