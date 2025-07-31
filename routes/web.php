<?php

use Illuminate\Support\Facades\Route;

Route::get('siswa/create', function () {
    return view('siswa.create');
});
Route::get('/', function () {
    return view('siswa.index');
});

