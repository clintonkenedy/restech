<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
    //CHANGE PASSWORD
    Route::get('/password/edit', [UserController::class, 'edit_pass'])->name('password.edit');
    Route::post('/password/update', [UserController::class, 'update_pass'])->name('password.update');

    ///TICKETS

    Route::get('/tickets/pendientes', [TicketController::class, 'ticketsPendientes'])->name('tickets.pendientes');

    Route::get('/tickets/listos', [TicketController::class, 'ticketsSolucionado'])->name('tickets.solucionados');

    Route::get('/tickets/cancelados', [TicketController::class, 'ticketsCancelado'])->name('tickets.cancelados');

    Route::get('/tickets/edit/{id}', [TicketController::class,'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{ticket}', [TicketController::class,'update'])->name('tickets.update');
    Route::delete('/tickets/destroy/{id}', [TicketController::class,'destroy'])->name('tickets.destroy');
});
