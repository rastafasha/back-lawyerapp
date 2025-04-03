<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;


Route::get('/publicacions', [PublicacionController::class, 'index'])
    ->name('publicacion.index');

Route::post('/publicacion/store', [PublicacionController::class, 'store'])
    ->name('publicacion.store');

Route::get('/publicacion/show/{publicacion}', [PublicacionController::class, 'show'])
    ->name('publicacion.show');


Route::put('/publicacion/update/{publicacion}', [PublicacionController::class, 'update'])
    ->name('publicacion.update');

Route::delete('/publicacion/destroy/{publicacion}', [PublicacionController::class, 'destroy'])
    ->name('publicacion.destroy');

Route::put('/publicacion/update/status/{publicacion:id}', [PublicacionController::class, 'updateStatus'])
    ->name('publicacion.status');

Route::post('/publicacion/upload', [PublicacionController::class, 'upload'])
    ->name('publicacion.upload');

Route::delete('/publicacion/delete-foto/{id}', [PublicacionController::class, 'deleteFoto'])
    ->name('publicacion.deleteFoto');
