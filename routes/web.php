<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/jogo-da-velha', function () {
    return view('jogo-da-velha');
})->middleware('auth');