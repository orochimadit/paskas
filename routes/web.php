<?php

use Illuminate\Support\Facades\Route;

//route home
Route::get('/', function () {
    return \Inertia\Inertia::render('Auth/Login');
})->middleware('guest');

//prefix "apps"
Route::prefix('apps')->group(function() {

    //middleware "auth"
    Route::group(['middleware' => ['auth']], function () {

        //route dashboard
        Route::get('dashboard', App\Http\Controllers\Apps\DashboardController::class)->name('apps.dashboard');
        
        //route permissions
        Route::get('/permissions', \App\Http\Controllers\Apps\PermissionController::class)->name('apps.permissions.index')
            ->middleware('permission:permissions.index');

        //route resource roles
        Route::resource('/roles', \App\Http\Controllers\Apps\RoleController::class, ['as' => 'apps'])
            ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');

         //route resource roles
         Route::resource('/paskas', \App\Http\Controllers\Apps\PaskasController::class, ['as' => 'apps'])
         ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');

        //route resource schedules
        Route::resource('/schedules', \App\Http\Controllers\Apps\ScheduleController::class, ['as' => 'apps'])
           ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');
        
         //route resource schedules
        Route::resource('/registrations', \App\Http\Controllers\Apps\RegistrationController::class, ['as' => 'apps'])
         ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');
    
         //route resource attendances
        Route::resource('/attendances', \App\Http\Controllers\Apps\AttendanceController::class, ['as' => 'apps'])
         ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');
    });
    Route::get('/provinces',[\App\Http\Controllers\Apps\LocationController::class,'provinces'],['as' => 'apps'])->name('provinces');
    Route::get('/provinces/{province}/',[\App\Http\Controllers\Apps\LocationController::class,'regencies'],['as' => 'apps'])->name('regencies');
    Route::get('/regencies/{regencies}/',[\App\Http\Controllers\Apps\LocationController::class,'districts'],['as' => 'apps'])->name('districts');
    Route::get('/districts/{district}/',[\App\Http\Controllers\Apps\LocationController::class,'villages'],['as' => 'apps'])->name('villages');
});