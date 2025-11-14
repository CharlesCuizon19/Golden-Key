<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/about-us', [PageController::class, 'about_us'])->name('about-us');

Route::get('/unit-listing', [PageController::class, 'unit_listing'])->name('unit-listing.all');
Route::get('/unit-listing/{id}', [PageController::class, 'unit_listing_singlepage'])->name('unit-listing.singlepage');

Route::get('/FAQs', [PageController::class, 'FAQs'])->name('FAQs');

Route::get('/contact-us', [PageController::class, 'contact_us'])->name('contact-us');
