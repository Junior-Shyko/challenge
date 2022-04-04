<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
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
Route::get('criar-disciplina', [App\Http\Livewire\Discipline\Create::class, '__invoke'])->name('twcriar-disciplinaeets');
Route::get('materia/{id}', [App\Http\Livewire\Discipline\Edit::class, '__invoke']);

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get(
        'dashboard',
        [WelcomeController::class, 'index']
    )->name('dashboard');
});
