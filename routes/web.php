<?php

use App\Http\Controllers\companiesController;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\ProfileController;
use Cassandra\Index;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// COMPANY ROUTES
Route::get('/companies', [companiesController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [companiesController::class, 'create'])->name('companies.create');
Route::post('/companies', [companiesController::class, 'store'])->name('companies.store');
Route::get('/companies/{companies}', [companiesController::class, 'show'])->name('companies.show');
Route::get('/companies/{companies}/edit', [companiesController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{companies}', [companiesController::class, 'update'])->name('companies.update');
Route::delete('/companies/{companies}', [companiesController::class, 'destroy'])->name('companies.destroy');

// EMPLOYEE ROUTES
Route::get('/employees', [employeesController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [employeesController::class, 'create'])->name('employees.create');
Route::post('/employees', [employeesController::class, 'store'])->name('employees.store');
Route::get('/employees/{employees}', [employeesController::class, 'show'])->name('employees.show');
Route::get('/employees/{employees}/edit', [employeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employees}', [employeesController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employees}', [employeesController::class, 'destroy'])->name('employees.destroy');



require __DIR__.'/auth.php';

