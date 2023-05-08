<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function(){
//     return view('dash.index');
// })->name('dash');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

// Route::get('/dash/crud', function () {
//     return view('crud.index');
// });

// Route::get('/dash/crud/create', function () {
//     return view('crud.create');
// });

Route::get('/dash/crud', 'App\Http\Controllers\DashboardController@index');
Route::get('/dash/crud/create', 'App\Http\Controllers\DashboardController@create');
