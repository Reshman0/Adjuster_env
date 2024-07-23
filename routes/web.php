<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageCont;
use App\Http\Controllers\DB_Operations;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Contract;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



//require __DIR__.'/auth.php';


Route::get('/deneme', function () { return view('ornek'); });
Route::get('/mainPage', [MainPageCont::class, 'index']);
Route::get('/mainPage', [MainPageCont::class, 'index'])->name('home');
Route::get('/employees', [MainPageCont::class, 'employees'])->name('employees');
Route::get('/addEmployee', [MainPageCont::class, 'addEmployee'])->name('addEmployee');
Route::get('/employees', [DB_Operations::class, 'getEmployees'])->name('employees.index');
Route::get('/employees/create', [DB_Operations::class, 'create'])->name('employees.create');
Route::post('/employees', [DB_Operations::class, 'store'])->name('employees.store');
Route::get('/employees', [DB_Operations::class, 'index'])->name('employees');
Route::get('/employees/create', [DB_Operations::class, 'create'])->name('addEmployee');
Route::post('/employees', [DB_Operations::class, 'store'])->name('employees.store');
// routes/web.php
Route::get('/organizations/create', [DB_Operations::class, 'createOrganization'])->name('createOrganization');
Route::post('/organizations/store', [DB_Operations::class, 'storeOrganization'])->name('storeOrganization');
Route::get('/organizations', [DB_Operations::class, 'indexOrganization'])->name('organizations.index');
Route::get('/employees/create', [DB_Operations::class, 'createEmployee'])->name('createEmployee');
Route::post('/employees/store', [DB_Operations::class, 'storeEmployee'])->name('storeEmployee');

Route::get('/companies', [DB_Operations::class, 'indexCompany'])->name('companies.index');
Route::get('/companies/create', [DB_Operations::class, 'createCompany'])->name('companies.create');
Route::post('/companies/store', [DB_Operations::class, 'storeCompany'])->name('companies.store');

Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.index');
Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');
Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');