<?php

use App\Http\Controllers\XMLController;
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

Route::get('/', [])->name('home');
Route::get('/about-us', [])->name('about-us');
Route::get('/services', [])->name('services');
Route::get('/projects', [])->name('projects');
Route::get('/our-team', [])->name('our-team');
Route::get('/contact-us', [])->name('contact-us');
Route::get('/testimonials', [])->name('testimonials');
Route::get('/blog', [])->name('blogs');
Route::get('/blog/{slug}', [])->name('blog');
Route::get('/blog/category/{slug}', [])->name('category');
Route::get('/blog/search/{slug}', [])->name('blogSearch');

Route::get('/sitemap.xml', [XMLController::class, 'index']);
