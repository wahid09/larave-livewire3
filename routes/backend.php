<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Livewire\AccessLog\AccessLogList;
use App\Livewire\Backend\Module\ModuleListComponent;
use App\Livewire\DevConsole\DataImport;
use App\Livewire\LoginRecord\LoginRecordList;
use App\Livewire\Permission\PermissionList;
use App\Livewire\Rank\RankList;
use App\Livewire\Role\RoleList;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', DashboardController::class)->name('dashboard');
//Module
Route::get('/dev-console/modules', ModuleListComponent::class)->name('dev-console/modules');
Route::get('dev-console/data-imports', DataImport::class)->name('dev-console/data-imports');

//Role
Route::get('/dev-console/roles', RoleList::class)->name('dev-console/roles');

//Permission
Route::get('/dev-console/permissions', PermissionList::class)->name('dev-console/permissions');

//Access Log
Route::get('access-control/access-logs', AccessLogList::class)->name('access-control/access-logs');

//Login Record

Route::get('access-control/login-records', LoginRecordList::class)->name('access-control/login-records');

//Rank
Route::get('application-setup/ranks', RankList::class)->name('application-setup/ranks');