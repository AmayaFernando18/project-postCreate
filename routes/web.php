<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AccountController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/places/{id}',[HomeController::class,'detail'])->name('place.detail');
Route::post('/save-place-review',[HomeController::class,'saveReview'])->name('place.saveReview');


Route::group(['prefix' => 'account'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::get('register',[AccountController::class,'register'])->name('account.register');
        Route::post('register',[AccountController::class,'processRegister'])->name('account.processRegister');
        Route::get('login',[AccountController::class,'login'])->name('account.login');
        Route::post('login',[AccountController::class,'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::get('profile',[AccountController::class,'profile'])->name('account.profile');
        Route::get('logout',[AccountController::class,'logout'])->name('account.logout');
        Route::post('updateProfile',[AccountController::class,'updateProfile'])->name('account.updateProfile');


       


            Route::group(['middleware'=> 'check-admin'],function(){
                Route::get('places',[PlaceController::class,'index'])->name('places.index');
                Route::get('places/create',[PlaceController::class,'create'])->name('places.create');
                Route::post('places',[PlaceController::class,'store'])->name('places.store');
                Route::get('places/edit/{id}',[PlaceController::class,'edit'])->name('places.edit');
                Route::post('places/edit/{id}',[PlaceController::class,'update'])->name('places.update');
                Route::delete('places',[PlaceController::class,'destroy'])->name('places.destroy');



                Route::get('reviews',[ReviewController::class,'index'])->name('account.reviews');
                Route::get('reviews/{id}',[ReviewController::class,'edit'])->name('account.reviews.edit');
                Route::post('reviews/{id}',[ReviewController::class,'updateReview'])->name('account.reviews.updateReview');
                Route::delete('delete-review',[ReviewController::class,'deleteReview'])->name('account.reviews.deleteReview');

            });

        


        Route::get('my-reviews',[AccountController::class,'myReviews'])->name('account.myReviews');

        Route::get('my-reviews/{id}',[AccountController::class,'editReview'])->name('account.myReviews.editReview');
        Route::post('my-reviews/{id}',[AccountController::class,'updateReview'])->name('account.myReviews.updateReview');
        Route::post('delete-my-reviews',[AccountController::class,'deleteReview'])->name('account.myReviews.deleteReview');
        
        
        

        
  
    });

});