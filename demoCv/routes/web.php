<?php

use App\Http\Controllers\lightCvComponentsController;
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
Route::get('/createCv', [LightCvController::class, 'create'])->name('lightCv.create');// we will need a user id for asigning the cv to the user.
Route::post('/createCv', [LightCvController::class, 'store'])->name('lightCv.store');

Route::get('/loadCv/{lightCv}', [LightCvController::class, 'loadCvTemplate'])->name('cv.load');
Route::get('/userPanel/{user}', [PanelController::class, 'loadUserPanel'])->name('panel.load');

Route::get('/editCv/{lightCv}', [LightCvController::class, 'edit'])->name('cv.edit');

Route::post('/editPinfo', [lightCvComponentsController::class, 'editPersonalInfo'])->name('pInfo.edit');

Route::post('/editWexp', [lightCvComponentsController::class, 'editWexpAjax'])->name('wExp.edit');

Route::post('/editEduc', [lightCvComponentsController::class, 'editEducationAjax'])->name('educ.edit');

Route::post('/editFlang', [lightCvComponentsController::class, 'editFlangAjax'])->name('fLang.edit');

Route::post('/editExpSkill', [lightCvComponentsController::class, 'editExpSkillAjax'])->name('expSkill.edit');

Route::post('/editCandC', [lightCvComponentsController::class, 'cAndCEditAjax'])->name('cAndC.Edit');

Route::post('/editAchv', [lightCvComponentsController::class, 'achvEditAjax'])->name('achv.edit');

Route::post('/editRAndA', [lightCvComponentsController::class, 'rAndAEditAjax'])->name('rAndA.edit');

Route::post('/editPracProj', [lightCvComponentsController::class, 'pracProjectEditAjax'])->name('pracProj.edit');

Route::post('/editLink', [lightCvComponentsController::class, 'linkEditAjax'])->name('link.edit');
