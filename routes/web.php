<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'launchHome'])->name('home');
Route::get('/assignment', [AssignmentController::class, 'launchAssignment'])->name('assignment');

Route::post('/addAssignment', [AssignmentController::class, 'addAssignment'])->name('addAssignment');
