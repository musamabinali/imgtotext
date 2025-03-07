<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog as Blog;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TurnstileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

Route::get('/',function () { return view('welcome');})->name('welcome');

Route::get('/pdf-to-text',function (){return view('tools/pdf-to-text');})->name('pdf-to-text');
Route::get('/pdf-to-word',function (){return view('tools/pdf-to-word');})->name('pdf-to-word');
Route::get('/jpg-to-word',function (){return view('tools/jpg-to-word');})->name('jpg-to-word');
Route::get('/image-to-text',function (){return view('tools/image-to-text');})->name('image-to-text');
Route::get('/image-text-translator',function (){return view('tools/image-text-translator');})->name('image-text-translator');
Route::post('/translate', [App\Http\Controllers\ImgtxtController::class, 'translateText'])->name('translate');

Route::get('/blog',function (){return view('blog');})->name('blog');
Route::get('/contact-us', function () {return  view('contact'); })->name('contact');
Route::post('/contact-us', [ContactController::class, 'contactUs'])->name('contact-us');
Route::get('/privacy-policy', function () {return view('privacy');})->name('privacy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



