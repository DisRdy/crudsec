<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/products', \App\Livewire\Products::class)
    ->middleware(['auth'])
    ->name('products');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


require __DIR__.'/auth.php';