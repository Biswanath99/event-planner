<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{HomeController};


     Route::get('/'                       ,[HomeController::class ,'index'])->name('index');
     Route::get('service-details/{slug}'  ,[HomeController::class ,'serviceDetails'])->name('service-details');
     Route::get('gallery'                 ,[HomeController::class ,'gallery'])->name('gallery');
     Route::get('gallery-details'         ,[HomeController::class ,'galleryDetails'])->name('gallery-details');
     Route::get('about-us'                ,[HomeController::class ,'aboutUs'])->name('about-us');
     Route::get('contact-us'              ,[HomeController::class ,'contactUs'])->name('contact-us');
     Route::get('faq'                     ,[HomeController::class ,'faq'])->name('faq');
     Route::get('appointment'             ,[HomeController::class ,'appointment'])->name('appointment');