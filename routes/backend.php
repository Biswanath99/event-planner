<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\Backend\AuthController;
use App\Http\Controllers\Backend\{CMSController,GalleryController,HomeController,InquiriesController,NewsLettersController,CategoriesController,BannerController,ServiceController,ServiceDetailsController};

    Route::prefix('admin')->name('admin.')->group(function (){

        Route::get('login'                   ,[AuthController::class ,'loginForm'])->name('login');
        Route::post('login'                  ,[AuthController::class ,'login'])->name('post.login');
        Route::get('forgot-password'         ,[AuthController::class ,'forgotPasswordForm'])->name('forgot-password');
        Route::post('forgot-password'        ,[AuthController::class ,'sendResetLink'])->name('reset-link');
        Route::post('resend-reset-link'      ,[AuthController::class ,'resendResetLink'])->name('resend-link');
        Route::get('reset-password/{token}'  ,[AuthController::class ,'resetPasswordForm'])->name('reset-password');
        Route::post('reset-password'         ,[AuthController::class ,'resetPassword'])->name('post.reset-password');

        Route::middleware('auth-check:admin')->group(function () {

            Route::get('/'                            ,[HomeController::class         , 'index'])->name('index');

            Route::get('banner'                       ,[BannerController::class          , 'index'])->name('banner.index');
            Route::get('create-banner'                ,[BannerController::class          , 'create'])->name('banner.create');
            Route::post('create-banner'               ,[BannerController::class          , 'store'])->name('banner.store');
            Route::get('edit-banner/{id}'             ,[BannerController::class          , 'edit'])->name('banner.edit');
            Route::post('update-banner/{id}'          ,[BannerController::class          , 'update'])->name('banner.update');

            Route::get('service'                      ,[ServiceController::class         , 'index'])->name('service.index');
            Route::get('create-service'               ,[ServiceController::class         , 'create'])->name('service.create');
            Route::post('create-service'              ,[ServiceController::class         , 'store'])->name('service.store');
            Route::get('edit-service/{id}'            ,[ServiceController::class         , 'edit'])->name('service.edit');
            Route::post('update-service/{id}'         ,[ServiceController::class         , 'update'])->name('service.update');

            Route::get('service-details'              ,[ServiceDetailsController::class         , 'index'])->name('service-details.index');
            Route::get('create-service-details'       ,[ServiceDetailsController::class         , 'create'])->name('service-details.create');
            Route::post('create-service-details'      ,[ServiceDetailsController::class         , 'store'])->name('service-details.store');
            Route::get('edit-service-details/{id}'    ,[ServiceDetailsController::class         , 'edit'])->name('service-details.edit');
            Route::post('update-service-details/{id}' ,[ServiceDetailsController::class         , 'update'])->name('service-details.update');

            Route::get('categories'                     ,[CategoriesController::class , 'index'])->name('categories.index');
            Route::get('create-category'                ,[CategoriesController::class , 'create'])->name('categories.create');
            Route::post('create-category'               ,[CategoriesController::class , 'store'])->name('categories.store');
            Route::get('edit-category/{id}'             ,[CategoriesController::class , 'edit'])->name('categories.edit');
            Route::post('update-category/{id}'          ,[CategoriesController::class , 'update'])->name('categories.update');
            Route::post('delete-category/{id}'          ,[CategoriesController::class , 'destroy'])->name('categories.delete');
            Route::get('trash-category'                 ,[CategoriesController::class , 'trash'])->name('categories.trash');
            Route::post('category-restore/{id}'         ,[CategoriesController::class , 'restore'])->name('categories.restore');
            Route::post('category-permanent-delete/{id}',[CategoriesController::class ,'forceDelete'])->name('categories.permanent-delete');

            Route::get('gallery'                       ,[GalleryController::class    , 'index'])->name('gallery.index');
            Route::get('create-gallery'                ,[GalleryController::class    , 'create'])->name('gallery.create');
            Route::post('create-gallery'               ,[GalleryController::class    , 'store'])->name('gallery.store');
            Route::get('edit-gallery/{id}'             ,[GalleryController::class    , 'edit'])->name('gallery.edit');
            Route::post('update-gallery/{id}'          ,[GalleryController::class    , 'update'])->name('gallery.update');
            Route::post('delete-gallery/{id}'          ,[GalleryController::class    , 'destroy'])->name('gallery.delete');
            Route::get('trash-gallery'                 ,[GalleryController::class    , 'trash'])->name('gallery.trash');
            Route::post('gallery-restore/{id}'         ,[GalleryController::class    , 'restore'])->name('gallery.restore');
            Route::post('gallery-permanent-delete/{id}',[GalleryController::class    , 'forceDelete'])->name('gallery.permanent-delete');

            Route::get('cms'                           ,[CMSController::class          , 'index'])->name('cms.index');
            Route::get('create-cms'                    ,[CMSController::class          , 'create'])->name('cms.create');
            Route::post('create-cms'                   ,[CMSController::class          , 'store'])->name('cms.store');
            Route::get('edit-cms/{id}'                 ,[CMSController::class          , 'edit'])->name('cms.edit');
            Route::post('update-cms/{id}'              ,[CMSController::class          , 'update'])->name('cms.update');

            

            Route::get('inquiries'              ,[InquiriesController::class  , 'index'])->name('inquiries.index');
            Route::get('reply-back/{id}'        ,[InquiriesController::class  , 'replyBack'])->name('inquiries.reply-back');
            Route::get('view/{id}'              ,[InquiriesController::class  , 'view'])->name('inquiries.view');
            Route::post('reply-back/{id}'       ,[InquiriesController::class  , 'store'])->name('inquiries.reply-back.store');


            Route::get('news-letters'           ,[NewsLettersController::class  , 'index'])->name('news-letters.index');
            Route::post('logout'                ,[AuthController::class         , 'logout'])->name('logout');
        });
    });
