<?php

use App\Http\Controllers\auth\LoginAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/example-data', function () {
return response()->json([
['id' => 1, 'name' => 'Item 1'],
['id' => 2, 'name' => 'Item 2'],
['id' => 3, 'name' => 'Item 3'],
]);
});

Route::post('/admin/auth/login', [LoginAdminController::class, 'admin_login']);
// dd
