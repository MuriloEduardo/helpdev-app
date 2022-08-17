<?php

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TalksController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return Route::permanentRedirect('dashboard');
});

Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/{user:slug}', [UsersController::class, 'show'])->name('users.show');

Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/{tag:slug}', [TagsController::class, 'show'])->name('tags.show');

Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/posts/{post:slug}', [PostsController::class, 'show'])->name('posts.show');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('/talks', [TalksController::class, 'index'])->name('talks.index');
    Route::get('/talks/{talk}', [TalksController::class, 'show'])->name('talks.show');

    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionsController::class, 'create'])->name('transactions.create');

    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');
    Route::delete('/notifications', [NotificationsController::class, 'destroy'])->name('notifications.destroy');
});
