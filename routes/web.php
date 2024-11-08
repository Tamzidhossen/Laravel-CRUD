<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'Edit'])->name('main');
Route::get('/products', [ProductController::class, 'product'])->name('product');

//Image Upload & Update
Route::post('/upload/image', [ImageController::class, 'uploadImage'])->name('upload.image');
Route::get('/Edit/{id}/image', [ImageController::class, 'editImage'])->name('edit.image');
Route::post('/Update/{id}/image', [ImageController::class, 'updateImage'])->name('update.image');

//Product CRUD
Route::get('/product/create', [ProductController::class, 'product_create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/delete/{id}', [ProductController::class, 'product_destoy'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'product_edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'product_update'])->name('product.update');