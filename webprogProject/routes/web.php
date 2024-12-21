<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

Route::get("/", [UserController::class,"homepage"])->name("home.view");
Route::get('/login' ,  [UserController::class , 'loginForm'] )->name('loginForm.view');
Route::get('/register' ,  [UserController::class , 'registerForm'] )->name('registerForm.view');
Route::post('/login' ,  [UserController::class , 'login'] );
Route::post('/register' ,  [UserController::class , 'register'] );
Route::get("/partner-page" , [DonationController::class , 'partnerPage'])->name('partnerPage.view');
Route::post('/register-as-partner' ,  [UserController::class , 'registerAsPartner'] );
Route::get('/register-as-partner-form' ,  [UserController::class , 'registerAsPartnerForm'] );
Route::get("/donation-page" , [DonationController::class , 'donationPage'] )->name('donationPage.view');
Route::get('/pick-up-form', [DonationController::class , 'pickUpFormPage'])->name('pickUpFormPage.view');
Route::POST('/pick-up', [DonationController::class , 'pickUpForm'])->name('pickUpForm.view');
Route::GET("/admin/donation" , [UserController::class , 'showDonations'] )->name('admin.donations');
Route::post('/admin/event/create', [UserController::class, 'createEvent'])->name('admin.create_event');
Route::GET("/admin/event" , [EventController::class , 'showEvents'])->name('admin.events');
Route::DELETE("/admin/event/{id}/delete" , [EventController::class , 'deleteEvent'])->name('admin.delete_event');
Route::POST('/admin/events/{id}/update', [EventController::class, 'updateEvent'])->name('admin.update_event');
Route::get('/volunteer/events', [VolunteerController::class, 'showEventsForVolunteers'])->name('volunteer.events');
Route::post('/volunteer/events/{id}/register', [VolunteerController::class, 'registerForEvent'])->name('volunteer.register');
Route::get("/volunteer/event-detail" , [VolunteerController::class , 'showEventDetail'])->name('eventDetail.view');
Route::get("partner/donation" , [UserController::class , 'showDonation']  );
Route::patch('/admin/donations/{donation}/update-status', [UserController::class, 'updateDonationStatus'])->name('admin.update_donation_status');
