<?php

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