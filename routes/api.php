<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/user', function(){
    return "Hello user";
});

Route::post('/user{id}',function($id){
    return response()->json([
        'message' => 'User created successfully',
        'user_id' => $id
    ]);
});

Route::put('/user{id}',function($id){
    return response('put' . $id, 200);
        
});

Route::delete('/user{id}',function($id){
    return response('delete'. $id, 202);
});



Route::post('/user/store',[UserController::class, 'store']);
Route::get('/user',[UserController::class, 'index']);
Route::get('/user/show/{id}', [UserController::class, 'show']);
Route::delete('user/delete/{id}', [UserController::class, 'destroy']);
Route::put('user/update/{id}',[UserController::class, 'update']);
Route::patch('user/change-password/{id}', [UserController::class, 'changepassword']);