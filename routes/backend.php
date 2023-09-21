<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Livewire\Backend\Module\ModuleListComponent;
use App\Livewire\DevConsole\DataImport;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('dev-console/modules', ModuleListComponent::class)->name('module');
Route::get('dev-console/data-imports', DataImport::class)->name('data_import');