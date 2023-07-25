<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Livewire\Backend\Module\ModuleListComponent;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/module', ModuleListComponent::class)->name('module');