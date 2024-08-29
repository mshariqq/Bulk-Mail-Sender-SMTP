<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\EmailCampaignController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Email List Routes
    Route::get('/email-lists', [EmailListController::class, 'index'])->name('email_list.index');
    Route::post('/email-lists/import', [EmailListController::class, 'import'])->name('email_list.import');
    Route::delete('/email-lists/delete/{id}', [EmailListController::class, 'destroy'])->name('email_list.destroy');
    Route::delete('/email-lists/delete-multiple', [EmailListController::class, 'deleteMultiple'])->name('email_list.delete_multiple');

    // Import route
    Route::post('/email-lists/import', [EmailListController::class, 'import'])->name('email_list.import');


    Route::get('/email-campaigns', [EmailCampaignController::class, 'index'])->name('email_campaign.index');
    Route::get('/email-campaigns/create', [EmailCampaignController::class, 'create'])->name('email_campaign.create');
    Route::post('/email-campaigns', [EmailCampaignController::class, 'store'])->name('email_campaign.store');
    Route::post('/email-campaigns/start', [EmailCampaignController::class, 'start'])->name('email_campaign.start');

});


Route::get('/test-email', function () {
    Mail::raw('tomorrow is meeting dear sir', function ($message) {
        $message->to('shariqq.com@gmail.com')
                ->subject('meeting tomorrow');
    });

    return 'Test email sent!';
});

require __DIR__.'/auth.php';
