<?php

use App\Livewire\User\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/',Dashboard::class)->name('user.dashboard');
Route::get('/admin',\App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');