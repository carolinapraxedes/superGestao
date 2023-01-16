<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;



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
Route::get('/login', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'auth'])->name('site.login');

Route::middleware('authentication:default')->prefix('/app')->group(function(){
    Route::get('/clients',function(){return 'Clients';})
        ->name('app.clients');
    Route::get('/providers',function(){return 'Providers';})
        ->name('app.providers');
    Route::get('/products', function(){return 'Products';})
        ->name('app.products');
});


