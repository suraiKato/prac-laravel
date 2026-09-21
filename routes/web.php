<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\EmailVerificationNotificationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PasswordConfirmationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\ProjectInvitationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home.index')->name('home');
Route::redirect('/home', '/');

Route::middleware('guest')->group (function() {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('reset-password', [ResetPasswordController::class, 'index'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::get('email/verify', [EmailVerificationController::class, '__invoke'])->middleware('auth')->name('verification.notice');
Route::post('email/verication-notification', [EmailVerificationNotificationController::class, '__invoke'])->middleware('auth')->name('verification.send');
Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('projects', [ProjectController::class, 'index'])->name('user.projects');
    Route::get('projects/create', [ProjectController::class, 'create'])->name('user.projects.create');
    Route::post('projects', [ProjectController::class, 'store'])->name('user.projects.store');
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('user.projects.show');
    Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('user.projects.edit');
    Route::put('projects/{project}', [ProjectController::class, 'update'])->name('user.projects.update');
    Route::delete('projects/{project}', [ProjectController::class, 'delete'])->name('user.projects.delete');
    Route::get('projects/{project}/create-task', [TaskController::class, 'create'])->name('user.projects.task.create');
    Route::post('projects/{project}', [TaskController::class, 'store'])->name('user.projects.task.store');
    Route::get('projects/{project}/{task}/edit-task', [TaskController::class, 'edit'])->name('user.projects.task.edit');
    Route::put('projects/{project}/{task}', [TaskController::class, 'update'])->name('user.projects.task.update');
    Route::delete('projects/{project}/{task}', [TaskController::class, 'delete'])->name('user.projects.task.delete');
    Route::get('projects/{project}/invitations', [ProjectInvitationController::class, 'index'])->name('user.projects.invitations');
    Route::post('projects/{project}/invitations', [ProjectInvitationController::class, 'store'])->name('user.projects.invitations.store');
    Route::get('invitations/{token}', [ProjectInvitationController::class, 'show'])->name('invitations.show');
    Route::post('invitations/{token}/accept', [ProjectInvitationController::class, 'accept'])->name('invitations.accept');
    Route::post('invitations/{token}/decline', [ProjectInvitationController::class, 'decline'])->name('invitations.decline');

    Route::view('profile', 'user.profile.profile')->middleware('password.confirm')->name('user.profile');
    Route::get('confirm-password', [PasswordConfirmationController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [PasswordConfirmationController::class, 'store'])->name('password.store');
});                           




