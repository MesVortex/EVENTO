<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ProfileController;
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
});

Route::middleware(['auth', 'role:organizer'])->group(function () {

    Route::get('/organizer/dashboard', [OrganizerController::class, 'index'])->name('organizer.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/dashboard/users', [AdminController::class, 'usersDash'])->name('admin.users');
    Route::resource('/admin/dashboard/category', CategoryController::class);
    Route::patch('/admin/dashboard/{client}/ban', [ClientController::class, 'ban'])->name('client.ban');
    Route::put('/admin/dashboard/{organizer}/ban', [OrganizerController::class, 'ban'])->name('organizer.ban');
});


Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
