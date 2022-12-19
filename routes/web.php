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

    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');
    Route::post('/tickets/listo/{id}', [TicketController::class, 'ticket_listo'])->name('tickets.ticket_listo');
    Route::post('/tickets/cancelado/{id}', [TicketController::class, 'ticket_cancelado'])->name('tickets.ticket_cancelado');


    Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');

    Route::get('/tickets/pendientes/list', [TicketController::class, 'ticketsPendientesList'])->name('tickets.pendientes');

    Route::get('/tickets/listos/list', [TicketController::class, 'ticketsSolucionadoList'])->name('tickets.solucionados');

    Route::get('/tickets/cancelados/list', [TicketController::class, 'ticketsCanceladoList'])->name('tickets.cancelados');

    Route::get('/tickets/edit/{id}', [TicketController::class,'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{ticket}', [TicketController::class,'update'])->name('tickets.update');
    Route::delete('/tickets/destroy/{id}', [TicketController::class,'destroy'])->name('tickets.destroy');
});
