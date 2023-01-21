<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContantController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\Admin\UserSubscribeControoler as AdminUserSubscribeControoler;
use App\Http\Controllers\Frontend\CommentController as FrontendCommentController;
use App\Http\Controllers\Frontend\Contact;
use App\Http\Controllers\Frontend\GetPostController;
use App\Http\Controllers\Frontend\UserSubscribeControoler;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
     Route::get('/admins', [AdminAuth::class, 'admins']);

      });
      

    Route::prefix('/admin')->group(function(){
       Route::post('/login', [AdminAuth::class, 'login']);
        Route::post('/logout', [AdminAuth::class, 'logout']);
        
    
    
        Route::get('/categorys', [CategoryController::class, 'index']);
        Route::post('/categorys', [CategoryController::class, 'store']);
        Route::put('/categorys/{id}', [CategoryController::class, 'edit']);
        Route::patch('/categorys/{id}', [CategoryController::class, 'update']);
        Route::delete('/categorys/{id}', [CategoryController::class, 'delete']);
        Route::get('/categorys/{search}', [CategoryController::class, 'search']);
    
        Route::get('/posts', [PostController::class, 'index']);
        Route::post('/posts', [PostController::class, 'store']);
        Route::put('/posts/{id}', [PostController::class, 'edit']);
        Route::post('/posts/{id}', [PostController::class, 'update']);
        Route::delete('/posts/{id}', [PostController::class, 'delete']);
        Route::get('/posts/{search}', [PostController::class, 'search']);
    
      
        
        Route::get('/contacts', [ContantController::class, 'getContects']);
        
         Route::delete('/contacts/{id}', [ContantController::class, 'delete']);
    
         Route::get('/usersubscribe', [AdminUserSubscribeControoler::class, 'index']);
         Route::delete('/usersubscribe{id}', [AdminUserSubscribeControoler::class, 'delete']);
    
    
    
   
    });
    


Route::prefix('/front')->group(function(){
    Route::get('/all-posts',[GetPostController::class,'index']);
    Route::get('/viewd-posts',[GetPostController::class,'viewPosts']);
    Route::get('/single-posts/{id}',[GetPostController::class,'getPostById']);
    Route::get('/search-posts/{search}',[GetPostController::class,'searchPost']);
    Route::post('/contact',[Contact::class,'store']);
    Route::post('/usersubscribe',[UserSubscribeControoler::class,'store']);
});

