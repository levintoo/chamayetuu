<?php

use App\Http\Livewire\DashboardHomeComponent;
use App\Http\Livewire\LoanComponent;
use App\Http\Livewire\NotificationComponent;
use App\Http\Livewire\RegisterStepTwoComponent;
use App\Http\Livewire\TransactionsComponent;
use App\Http\Livewire\UserSettingsComponent;
use App\Http\Livewire\WalletComponent;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
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
    Route::get('/wallet',WalletComponent::class)->name('wallet');
        //payment routes
        Route::get('/execute-payment', 'App\Http\Livewire\WalletComponent@execute');
        Route::post('/create-payment', 'App\Http\Livewire\WalletComponent@create')->name('create-payment');
        Route::post('/get-token', 'App\Http\Livewire\WalletComponent@getAcessToken')->name('getAcessToken');
    Route::get('/transactions',TransactionsComponent::class)->name('transactions');
    Route::get('/user-settings',UserSettingsComponent::class)->name('user-settings');
    Route::get('/loans',LoanComponent::class)->name('loans');
    Route::get('/notification',NotificationComponent::class)->name('notification');

        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard2', function () {
                return view('dashboard');
            })->name('dashboard2');
        });
    Route::get('/register/step-two',RegisterStepTwoComponent::class)->name('register.step-two');
});
