<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\ProductsController;



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

Route::get('/', [PrincipalController::class,'principal'])
    ->name('site.index')
    ->middleware('log.acess');
    //para criar um apelido, vá no arquivo kernel


Route::get('/aboutUs',[AboutUsController::class,'aboutUs'])->name('site.aboutus');
Route::get('/contact',[ContactController::class,'contact'])->name('site.contact');
Route::post('/contact',[ContactController::class,'saveContact'])->name('site.contact');
Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'auth'])->name('site.login');

Route::middleware('authentication:default')->prefix('/app')->group(function(){
    Route::get('/home',[HomeController::class,'index'])
        ->name('app.home');
    Route::get('/logout',[LoginController::class,'logout'])
        ->name('app.logout');
    Route::get('/clients',[ClientsController::class,'index'])
        ->name('app.clients');

    //routes providers
    Route::get('/providers',[ProvidersController::class,'index'])
        ->name('app.providers');
        Route::post('/providers/list',[ProvidersController::class,'list'])
        ->name('app.providers.list');

        Route::get('/providers/add',[ProvidersController::class,'add'])
        ->name('app.providers.add');
        Route::post('/providers/add',[ProvidersController::class,'add'])
        ->name('app.providers.add');

        Route::get('/providers/edit/{id}/{msg?}',[ProvidersController::class,'edit'])
        ->name('app.providers.edit');




    Route::get('/products', [ProductsController::class,'index'])
        ->name('app.products');
});


