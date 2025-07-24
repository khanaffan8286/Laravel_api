<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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