<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('test-mail', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('shubham@gscb.com');
        $message->subject('Test Email');
        $message->from('shubham@gscb.com');
    });

    return 'Email sent successfully';
});

require __DIR__.'/settings.php';
