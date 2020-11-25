<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');



/*
 * Home Routes
 */

Route::get('/home', 'API\CourseController@home');
Route::get('/profile/{id}', 'API\ProfileController@index');
Route::get('/my-courses/{id}', 'API\ProfileController@getMyCourse');


/*
 * Course Routes
 */

Route::get('/courses', 'API\CourseController@index');
Route::get('/course/{id}', 'API\CourseController@course');
Route::get('/instructor/{id}', 'API\CourseController@getCourseByInstructor');

Route::post('/rating', 'API\RatingController@storeRating');
Route::post('/progress', 'API\ProgressController@storeProgress');
Route::post('/check/enrollment', 'API\CourseController@checkEnrollment');


Route::get('/all-categories', 'API\CourseController@allCategories');
Route::get('/category/{id}', 'API\CourseController@courseCategory');


Route::get('/all-levels', 'API\CourseController@allLevels');
Route::get('/level/{id}', 'API\CourseController@courseLevel');

Route::get('/search/{key}', 'API\CourseController@search');
Route::post('/course-enrollment', 'API\CourseController@courseEnrollment');



/*
 * Create Course Routes
 */

Route::post('create-course', 'API\CourseController@createCourse');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
