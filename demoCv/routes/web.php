<?php

use App\Http\Controllers\LightCvController;
use App\Http\Controllers\PanelController;
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
Route::get('/createCv', [LightCvController::class, 'create'])->name('lightCv.create');
Route::post('/createCv', [LightCvController::class, 'store'])->name('lightCv.store');

Route::get('/loadCv/{lightCv}', [LightCvController::class, 'loadCvTemplate'])->name('cv.load');
Route::get('/userPanel/{user}', [PanelController::class, 'loadUserPanel'])->name('panel.load');
