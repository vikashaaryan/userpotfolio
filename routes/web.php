<?php

use App\Livewire\Admin\CreateProject;
use App\Livewire\Admin\ManageCategory;
use App\Livewire\Admin\ManageProject;
use App\Livewire\User\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/',Dashboard::class)->name('user.dashboard');
Route::get('/admin',\App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
Route::get('/category',ManageCategory::class)->name('category');
Route::get('/projects',CreateProject::class)->name('create-projects');
Route::get('/manage-project',ManageProject::class)->name('manage-project');