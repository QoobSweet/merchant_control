<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Board;

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

Route::get('/', [GuestController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // dashboard
    Route::get('/dashboard', [UserController::class, 'index'])
        ->name('dashboard');


    Route::get('/board-settings', [BoardsController::class, 'settings'])
        ->name('editBoard');

    Route::get('/board/{board_id}', function ($board_id) {
        return [BoardController::class, 'show'];
    })->name('board');
});

require_once __DIR__ . '/jetstream.php';

