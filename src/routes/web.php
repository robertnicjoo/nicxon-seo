<?php

use Illuminate\Support\Facades\Route;
use Nicxon\Seo\Http\Controllers\GlobalSeoController;

Route::middleware(config('nicxon-seo.middleware'))
    ->prefix('admin/seo')
    ->group(function () {
        Route::get('/', [GlobalSeoController::class, 'edit'])->name('nicxon.seo.global');
        Route::post('/', [GlobalSeoController::class, 'update'])->name('nicxon.seo.global.update');
    });