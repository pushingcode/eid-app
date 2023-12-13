<?php

use App\Models\Experiential;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
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
})->name('welcome');

Route::get('/result/{id}', App\Http\Controllers\ShowPublicResult::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', App\Http\Controllers\ShowDashboard::class)
        ->name('dashboard');
    Route::get('eid', function () {
        return view('eid');
    })->name('eid');
    Route::get('ipv', function () {
        return view('ipv');
    })->name('ipv');
});
