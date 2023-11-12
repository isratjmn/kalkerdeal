<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [FrontendController::class, 'welcome'])-> name('index');
Route::get('about', [FrontendController::class, 'about']);
Route::get('contact', [FrontendController::class, 'contact']);

Route::get('/dashboard', [BackendController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('category', [CategoryController::class, 'index']);
Route::get('category/create', [CategoryController::class, 'create']);
Route::post('category/insert', [CategoryController::class, 'insert']);
Route::get('category/delete/{category_id}', [CategoryController::class, 'delete']);
Route::get('category/restore/{category_id}', [CategoryController::class, 'restore']);
Route::get('category/permanent/delete/{category_id}', [CategoryController::class, 'permanent_delete']);
Route::get('category/update/{category_id}', [CategoryController::class, 'update']);
Route::post('category/edit/{category_id}', [CategoryController::class, 'edit']);
Route::get('category/all/restore', [CategoryController::class, 'restore_all']);
Route::get('category/all/permanent/delete', [CategoryController::class, 'p_deleteall']);
Route::get('user', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user/insert', [UserController::class, 'insert']);

Route::get('my/profile', [ProfilleController::class, 'index'])->name('profile');
Route::post('change/password', [ProfilleController::class, 'change_password'])->name('change.password');
Route::post('change/information', [ProfilleController::class, 'change_information'])->name('change.information');

Route::get('github/redirect', [GithubController::class, 'redirect'])->name('github.redirect');
Route::get('github/callback', [GithubController::class, 'callback'])->name('github.callback');

Route::get('google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
