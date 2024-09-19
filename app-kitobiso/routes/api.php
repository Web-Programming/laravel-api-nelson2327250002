<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FundingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/menu', function (Request $request) {
    return response()->json(['Home', 'Profile', 'About', 'Contact Us']);
});

Route::get('/donatur', function (Request $request) {
    return response()->json([
        [
            "id" => 1,
            "name" => "Donatur 1"
        ],
        [
            "id" => 2,
            "name" => "Donatur 2"
        ],
        [
            "id" => 3,
            "name" => "Donatur 3"
        ]
    ]);
});
//method in routes : get, post, put, patch, delete 
//buat route menuju url /donatur dengan method get
//buat responce berupa data json seperti berikut
/*
[    
    {
        "id": 1,
        "name": "Donatur 1",
    },
    {
        "id": 2,
        "name": "Donatur 2",
    },
    {
        "id": 3,
        "name": "Donatur 3",
    }
]
*/    

Route::group(['middleware' => 'auth:sanctum'], function () {
    //API CRUD Funding
    Route::get('/Funding', [FundingController::class, 'index']); //get all data
    Route::post('/Funding', [FundingController::class, 'store']); //create new data
    Route::get('/Funding/{id}', [FundingController::class, 'show']); //get single data
    Route::put('/Funding/{id}', [FundingController::class, 'update']); //update data
    Route::delete('/Funding/{id}', [FundingController::class, 'destroy']); //delete data

    //API CRUD Donation
    //Route::get('/Donation', [DonationController::class, 'index']); //get all data
    Route::apiResource('Donation', DonationController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
