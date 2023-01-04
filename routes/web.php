<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\FacturaController;

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

Route::get('/menu', [PlatoController::class, 'menu'])->name('menu');

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
    Route::get('/tickets/pagados/list', [TicketController::class, 'ticketsPagadoList'])->name('tickets.pagados');

    Route::get('/tickets/edit/{id}', [TicketController::class,'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{ticket}', [TicketController::class,'update'])->name('tickets.update');
    Route::delete('/tickets/destroy/{id}', [TicketController::class,'destroy'])->name('tickets.destroy');

    // PLATOS
    Route::get('/platos', [PlatoController::class, 'index'])->name('platos');
    Route::get('/platos/create', [PlatoController::class, 'create'])->name('platos.create');
    Route::get('/platos_fecha', [PlatoController::class, 'fecha'])->name('fecha');
    Route::get('/platos/store', [PlatoController::class, 'store'])->name('platos.store');
    Route::get('/platos/suspender/{plato}', [PlatoController::class, 'suspender'])->name('platos.suspender');
    Route::get('/platos/activar/{plato}', [PlatoController::class, 'activar'])->name('platos.activar');
    Route::get('/platos/edit/{plato}', [PlatoController::class, 'edit'])->name('platos.edit');
    Route::put('/platos/update/{plato}', [PlatoController::class, 'update'])->name('platos.update');

    // MESAS
    Route::get('/mesas', [MesaController::class, 'index'])->name('mesas');
    Route::get('/mesas/create', [MesaController::class, 'create'])->name('mesas.create');
    Route::get('/mesas/store', [MesaController::class, 'store'])->name('mesas.store');
    Route::get('/mesas/suspender/{mesa}', [MesaController::class, 'suspender'])->name('mesas.suspender');
    Route::get('/mesas/activar/{mesa}', [MesaController::class, 'activar'])->name('mesas.activar');
    Route::get('/mesa/{mesa}/pedidos', [MesaController::class, 'pedido'])->name('mesas.pedidos');
    Route::get('/mesa/{mesa}/pedidos_store', [MesaController::class, 'pedido_store'])->name('mesas.pedido_store');

    // FACTURAS
    Route::get('/facturas', [FacturaController::class, 'index'])->name('facturas');
    Route::get('/facturas/pagadas', [FacturaController::class, 'pagadas'])->name('pagadas');
    Route::get('/facturas/canceladas', [FacturaController::class, 'canceladas'])->name('canceladas');
    Route::get('/facturas/show/{factura}', [FacturaController::class, 'show'])->name('facturas.show');
    Route::post('/facturas/pagar/{factura}', [FacturaController::class, 'pagar'])->name('facturas.pagar');
    Route::get('/facturas/cancelar/{factura}', [FacturaController::class, 'cancelar'])->name('facturas.cancelar');

});
