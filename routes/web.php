<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*  Route::get('/', function () {
    return view('index');
}); */

Route::get('/', [ContactController::class,'index'])->name('index');

Route::get('/kontakt/dodaj', function () {
    return view('Contacts/add');
});


//Route::get('/kontakt/Edytuj', [ContactController::class,'edit'])->name('edit');
Route::get('/kontakt/{id}/Edytuj', [ContactController::class,'edit'])->name('edit');
Route::get('/kontakt/{id}/Usun', [ContactController::class,'delete'])->name('delete');


//Route::post('zapisz', 'ContactController@store');
Route::post('/kontakt/zapisz', [ContactController::class,'store'])->name('store');
Route::post('/kontakt/aktualizuj', [ContactController::class,'update'])->name('update');
