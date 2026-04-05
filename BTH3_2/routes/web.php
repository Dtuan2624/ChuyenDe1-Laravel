<?php

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);

Route::get('/', function () {
    $totalProducts = \App\Models\Product::count();
    $totalCategories = \App\Models\Category::count();
    $latestProducts = \App\Models\Product::latest()->take(5)->get();

    return view('dashboard', compact('totalProducts','totalCategories','latestProducts'));
});

