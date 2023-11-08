<?php

use App\Livewire\Customer\CustomerIndex;
use App\Livewire\Reward\RewardIndex;
use App\Livewire\Select2\Select2Index;
use App\Livewire\Select2\Select2Multiple;
use App\Livewire\Service\ServiceIndex;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/customer', CustomerIndex::class)->name('customer.index');

    // Route::get('/reward', RewardIndex::class)->name('reward.index');

    Route::get('/select2', Select2Index::class)->name('select2.index');
    // Route::get('/select2', Select2Multiple::class)->name('select2.index');

    Route::get('/service', ServiceIndex::class)->name('service.index');
    
});
