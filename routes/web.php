<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageCont;
use App\Http\Controllers\DB_Operations;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


Route::get('/deneme', function () { return view('ornek'); });
Route::get('/mainPage', [MainPageCont::class, 'index']);
Route::get('/employees', [MainPageCont::class, 'employees'])->name('employees');
Route::get('/addEmployee', [MainPageCont::class, 'addEmployee'])->name('addEmployee');
Route::get('/employees', [DB_Operations::class, 'getEmployees'])->name('employees.index');
Route::get('/employees/create', [DB_Operations::class, 'create'])->name('employees.create');
Route::post('/employees', [DB_Operations::class, 'store'])->name('employees.store');
Route::get('/employees', [DB_Operations::class, 'index'])->name('employees');
Route::get('/employees/create', [DB_Operations::class, 'create'])->name('addEmployee');
Route::post('/employees', [DB_Operations::class, 'store'])->name('employees.store');
    
    