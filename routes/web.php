<?php

use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManagerContller;
use Illuminate\Support\Facades\Route;

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/send', [ContactController::class, 'send']);
Route::get('/complete', [ContactController::class, 'complete']);

Route::get('/manager', [ManagerContller::class, 'index']);
Route::get('/manager/search', [ManagerContller::class, 'result']);
Route::post('/delete', [ManagerContller::class, 'delete']);
