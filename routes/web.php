<?php

use App\Http\Controllers\MpesaPaymentController;
use App\Http\Livewire\Admin\AddLoanProductComponent;
use App\Http\Livewire\Admin\AdminActions;
use App\Http\Livewire\Admin\EditLoanProductComponent;
use App\Http\Livewire\Admin\LoanApprovalComponent;
use App\Http\Livewire\Admin\LoanProductComponent;
use App\Http\Livewire\Admin\RegisterNewAdminComponent;
use App\Http\Livewire\Admin\SecretaryApprovalComponent;
use App\Http\Livewire\Admin\SecretaryApprovalProductComponent;
use App\Http\Livewire\Admin\UserManagementComponent;
use App\Http\Livewire\DashboardHomeComponent;
use App\Http\Livewire\Home\AboutUsComponent;
use App\Http\Livewire\Home\BlogComponent;
use App\Http\Livewire\Home\ContactComponent;
use App\Http\Livewire\Home\HomeComponent;
use App\Http\Livewire\Home\PortfolioComponent;
use App\Http\Livewire\LoanComponent;
use App\Http\Livewire\NotificationComponent;
use App\Http\Livewire\RegisterStepTwoComponent;
use App\Http\Livewire\TransactionsComponent;
use App\Http\Livewire\UserSettingsComponent;
use App\Http\Livewire\WalletComponent;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', HomeComponent::class)->name('index-page');
Route::get('/about',AboutUsComponent::class)->name('about');
Route::get('/blog',BlogComponent::class)->name('blog');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::get('/portfolio',PortfolioComponent::class)->name('portfolio');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::middleware(['registration_completed'])->group(function () {

        Route::get('/dashboard',DashboardHomeComponent::class)->name('dashboard');
        Route::get('/wallet',WalletComponent::class)->name('wallet');
        Route::get('/execute-payment', 'App\Http\Livewire\WalletComponent@execute');
        Route::post('/create-payment', 'App\Http\Livewire\WalletComponent@create')->name('create-payment');
        Route::post('/get-token', [MpesaPaymentController::class, 'getAccessToken'])->name('getAccessToken');
        Route::post('/register-urls', [MpesaPaymentController::class, 'registerURLS'])->name('registerURLS');
        Route::post('/simulate-transaction', [MpesaPaymentController::class, 'simulateTransaction'])->name('simulateTransaction');
        Route::post('/stk-push', [MpesaPaymentController::class, 'stkPush'])->name('stkPush');
        Route::get('/transactions',TransactionsComponent::class)->name('transactions');
        Route::get('/user-settings',UserSettingsComponent::class)->name('user-settings');
        Route::get('/loans',LoanComponent::class)->name('loans');
        Route::get('/notification',NotificationComponent::class)->name('notification');

        Route::middleware(['role_admin'])->prefix('admin')->group(function () {
            Route::get('/settings', AdminActions::class)->name('admin-settings');
            Route::get('/loanproduct', LoanProductComponent::class)->name('admin-loanproduct');
            Route::post('/add/loanproduct', [AddLoanProductComponent::class, 'create'])->name('add-loanproduct');
            Route::get('/newproduct', AddLoanProductComponent::class)->name('new-loan-product');
            Route::get('/editproduct/{loan_id}', EditLoanProductComponent::class)->name('edit-loan-product');
            Route::post('/editproduct', [EditLoanProductComponent::class, 'updateProduct'])->name('edit-product');
            Route::get('/secretary-approval', SecretaryApprovalComponent::class)->name('secretary.approval');
            Route::get('/users-management', UserManagementComponent::class)->name('user.management');
            Route::post('/users-management/promote', [UserManagementComponent::class,'promoteUser'])->name('user.promote');
            Route::post('/users-management/demote', [UserManagementComponent::class,'demoteUser'])->name('user.demote');
            Route::get('/loan-approval', LoanApprovalComponent::class)->name('loan.approval');
            Route::get('/register-admin', RegisterNewAdminComponent::class)->name('register.admin');
            Route::post('/add-admin', [RegisterNewAdminComponent::class,'registerAdmin'])->name('add.admin');
            Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');
        });

        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard2', function () {
            return view('dashboard');
        })->name('dashboard2');

    });

    Route::get('/register/step-two',RegisterStepTwoComponent::class)->name('register.step-two');
    Route::post('/register/otp-validate',[RegisterStepTwoComponent::class,'verifyuser'])->name('otp.validate');


});
