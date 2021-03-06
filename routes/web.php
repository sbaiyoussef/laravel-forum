<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('discussions', 'DiscussionController');
Route::resource('discussions/{discussion}/replies', 'RepliesController');
Route::get('users/notifications',[UsersController::class,'notifications'])->name('users.notifications');
Route::Post('discussions/{discussion}/replies/{reply}/mark-as-best-reply', 'DiscussionController@reply')->name('discussions.best-Reply');
