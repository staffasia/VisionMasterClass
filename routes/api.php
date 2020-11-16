<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('profile', 'API\ProfileController@register');



/*
 * Home Routes
 */

Route::get('/home', 'API\CourseController@home');


/*
 * Course Routes
 */

Route::get('/courses', 'API\CourseController@index');
Route::get('/course/{id}', 'API\CourseController@course');


Route::get('/all-categories', 'API\CourseController@allCategories');
Route::get('/category/{id}', 'API\CourseController@courseCategory');


Route::get('/all-levels', 'API\CourseController@allLevels');
Route::get('/level/{id}', 'API\CourseController@courseLevel');

Route::get('/search/{key}', 'API\CourseController@search');

Route::post('/course-enrollment', 'API\CourseController@courseEnrollment');



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
