<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludar/{name}/{lastname?}', function ($name,$lastname = "Doe") {
    return 'welcome '. $name .' '. $lastname;
});

Route::get('/suma/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 + $n2;
    return 'El resultado es: '. $resultado;
});

Route::get('/resta/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 - $n2;
    return 'El resultado es: '. $resultado;
});

Route::get('/multi/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 * $n2;
    return 'El resultado es: '. $resultado;
});

Route::get('/div/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 / $n2;
    return 'El resultado es: '. $resultado;
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
