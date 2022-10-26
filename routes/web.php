<?php

use App\Http\Controllers\ChirpController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --------
// "resource" can stand CRUD routing
// GET: chirps.index
// POST: chirps.store
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update'])
    // auth: ensure that only logged-in users can access the route
    // verified: to enable email verification
    ->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
