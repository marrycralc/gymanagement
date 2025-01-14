<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// routes/api.php
use App\Http\Controllers\Auth\PushNotificationController;

Route::post('/send-notification', function () {
   
    return response()->json(['message' => 'Notification sent!']);
});
