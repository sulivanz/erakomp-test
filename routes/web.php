<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductMaterialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MaterialController::class, 'create'])->name('materials.create');
Route::post('materials', [MaterialController::class, 'store'])->name('materials.store');
Route::get('product-materials', [ProductMaterialController::class, 'create'])->name('product.materials');
Route::post('product-materials', [ProductMaterialController::class, 'store'])->name('product.materials.store');
Route::get('product-plan', [ProductMaterialController::class, 'plan'])->name('product.plan');
Route::post('product-plan', [ProductMaterialController::class, 'calculatePlan'])->name('product.plan.calculate');
