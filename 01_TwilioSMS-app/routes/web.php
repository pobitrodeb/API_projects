<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\SmsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SmsController::class, 'sms_page']);

Route::post('/', [SmsController::class, 'send_sms'])->name('send.sms');


