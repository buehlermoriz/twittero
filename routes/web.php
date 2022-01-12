<?php

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
//---------------Route for not registrated Users----------------------------------------
Route::get('login', function () {
    return view('/auth/login');
});
//-----------------Home-----------------------------------------------------------------

Route::get('/', function () {
    //ausgeschalten um nicht den normalen Wilkommensscreen zu bekommen
    //return view('welcome');
    return view('home');
});

//-----------------Login-----------------------------------------------------------------

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//-----------------AJAX-----------------------------------------------------------------------

Route::get('/twitter-controller', function () {
    return \App\Http\Controllers\PostController::requestTwitter();
})->name("twitter-controller");

//----------------Webapplication (accassible only for registrated Users) ------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/twittero', function () {
        return view('twittero');
    });
    //-----------------User (CRUD)--------------------------------------------------

//-----------------Bearbeitungsseiten---------------------

    Route::get('user', function () {
        return view('/auth/user');
    });
    Route::get('edituser', function () {
        return view('/auth/editUser');
    });

//-----------------Funktionen---------------------

    Route::delete('/delete-user/{userId}', function () {
        return \App\Http\Controllers\PostController::destroyUser();
    })->name("delete-user");

    Route::patch('/edit-user/{userId}', function () {
        return \App\Http\Controllers\PostController::updateUser();
    })->name("edit-user");

    Route::get('/edit-user', function () {
        return \App\Http\Controllers\PostController::updateUser();
    })->name("edit-user-ajax");
});
