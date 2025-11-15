<?php

use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactUsController as ControllersContactUsController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitFeatureController;
use App\Http\Controllers\UnitTypeController;
use App\Models\ContactUs;

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

// Admin Authentication
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/about-us', [PageController::class, 'about_us'])->name('about-us');

Route::get('/unit-listing', [PageController::class, 'unit_listing'])->name('unit-listing.all');
Route::get('/unit-listing/{id}', [PageController::class, 'unit_listing_singlepage'])->name('unit-listing.singlepage');

Route::get('/FAQs', [PageController::class, 'FAQs'])->name('FAQs');

Route::get('/contact-us', [PageController::class, 'contact_us'])->name('contact-us');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('banners', BannerController::class);
    Route::resource('inquiries', InquiryController::class);
    Route::resource('contact-us', ControllersContactUsController::class);
    Route::resource('unit-type', UnitTypeController::class);
    Route::resource('units', UnitController::class);
     Route::resource('unit-feature', UnitFeatureController::class);
    Route::resource('agents', AgentController::class);
});
