<?php

use App\Http\Resources\SpeakerResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:public_api')->group(function (): void {
    Route::get('conferences', fn() => 'conferences');
    Route::get('speakers', fn() => SpeakerResource::collection(User::all()));
    Route::get('/user', fn(Request $request) => $request->user())->middleware('auth:sanctum');
});
