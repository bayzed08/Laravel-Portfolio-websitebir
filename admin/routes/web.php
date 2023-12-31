<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'HomeIndex']);
Route::get('/visitor', [VisitorController::class,'VisitorIndex']);

//Admin panel for service
Route::get('/service', [ServicesController::class,'ServicesIndex']);
Route::get('/getservicedata', [ServicesController::class,'getServiceData']);
Route::post('/deleteservicedata',[ServicesController::class,'deleteServiceData']);
Route::post('/updateservice',[ServicesController::class,'updateServiceData']);
Route::post('/addnewservice',[ServicesController::class,'addNewServiceData']);
Route::post('/detailsservice',[ServicesController::class,'detailsServiceData']);

//Admin panel for Course
Route::get('/course',[CourseController::class,'CoursesIndex']);
Route::get('/getcoursesdata',[CourseController::class,'getCoursesData']);


