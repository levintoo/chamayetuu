<?php

use App\Http\Livewire\DashboardHomeComponent;
use App\Http\Livewire\RegisterStepTwoComponent;
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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::middleware(['registration_completed'])->group(function () {
Route::get('/dashboard',DashboardHomeComponent::class)->name('dashboard');
        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard2', function () {
            return view('dashboard');
        })->name('dashboard2');
    });
    Route::get('/register/step-two',RegisterStepTwoComponent::class)->name('register.step-two');
});

