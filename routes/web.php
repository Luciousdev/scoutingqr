<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntriesController;

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
    return view('welcome');
});


Route::get('/entries/{alias}', [EntriesController::class, 'getEntry']);
Route::get('/cp', [EntriesController::class, 'auth']);
Route::get('/cp1234', [EntriesController::class, 'cp']);
Route::get('/logout', [EntriesController::class, 'logout']);

Route::post('/create-entry', [EntriesController::class, 'createEntry']);
Route::post('/auth-post', [EntriesController::class, 'authPost']);

Route::post('/generate-qr', [EntriesController::class, 'generate'])->name('generate.qr');
Route::post('/delete-entry', [EntriesController::class, 'delete'])->name('delete.entry');
Route::get('/update-entry', [EntriesController::class, 'goToUpdate'])->name('update.entry');
Route::post('/update-entry-post', [EntriesController::class, 'update'])->name('update.entry.post');
