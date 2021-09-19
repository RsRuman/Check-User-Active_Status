<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    return view('dashboard', [
        'users' => DB::table('users')->orderBy('last_seen', 'DESC')->get()
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
