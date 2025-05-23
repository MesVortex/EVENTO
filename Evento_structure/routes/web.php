<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'role:client'])->group(function () {

    Route::get('/client/landingPage', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/eventPage/event/{event}', [EventController::class, 'show'])->name('event.clientShow');
    Route::get('/client/event/explore', [EventController::class, 'explore'])->name('event.explore');
    Route::get('/client/home/reservations', [ClientController::class, 'clientReservations'])->name('client.reservations');
    Route::get('/client/reservation/ticket/{reservation}', [ClientController::class, 'ticket'])->name('ticket');
    Route::get('/client/event/explore/filter', [EventController::class, 'filter'])->name('event.filter');
    Route::get('/client/event/explore/search', [EventController::class, 'search'])->name('event.search');
    Route::resource('client/eventPage/reservation', ReservationController::class);
});

Route::middleware(['auth', 'role:organizer'])->group(function () {

    Route::get('/organizer/dashboard', [OrganizerController::class, 'index'])->name('organizer.index');
    Route::get('/organizer/statistics', [OrganizerController::class, 'statistics'])->name('organizer.statistics');
    Route::get('/organizer/dashboard/event/{event}/reservations', [ReservationController::class, 'showEventReservations'])->name('event.reservations');
    Route::patch('/organizer/dashboard/reservation/accept/{reservation}', [ReservationController::class, 'acceptReservation'])->name('organizer.accept');
    Route::delete('/organizer/dashboard/reservation/destroy/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.refuse');
    Route::resource('/organizer/dashboard/event', EventController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/dashboard/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
    Route::get('/admin/dashboard/users', [AdminController::class, 'usersDash'])->name('admin.users');
    Route::get('/admin/dashboard/requests', [AdminController::class, 'eventRequests'])->name('admin.requests');
    Route::get('/admin/dashboard/requests/{event}/show', [EventController::class, 'show'])->name('event.adminShow');
    Route::patch('/admin/dashboard/requests/{event}/accept', [EventController::class, 'acceptRequest'])->name('admin.accept');
    Route::put('/admin/dashboard/requests/{event}/refuse', [EventController::class, 'destroy'])->name('admin.refuse');
    Route::resource('/admin/dashboard/category', CategoryController::class);
    Route::patch('/admin/dashboard/{client}/ban', [ClientController::class, 'ban'])->name('client.ban');
    Route::put('/admin/dashboard/{organizer}/ban', [OrganizerController::class, 'ban'])->name('organizer.ban');
});


Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
