<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware'=> ['auth:sanctum', 'verified']],function ()  {




    /*
     * Load Demo Data
     */

    Route::get('/load-data', 'DataController@loadDemoData')->name('load.data');





    /*
     * Dashboard Routes
     */

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/home', 'DashboardController@index')->name('home');




    /*
     * Course Category Routes
     */

    Route::get('/categories', 'CourseController@courseCategory')->name('course.category');

    Route::get('/add/category', 'CourseController@addCourseCategory')->name('add.category');
    Route::post('/add/category', 'CourseController@storeCourseCategory')->name('store.category');




    /*
     * Course Level Routes
     */

    Route::get('/levels', 'CourseController@courseLevel')->name('course.level');

    Route::get('/add/level', 'CourseController@addCourseLevel')->name('add.level');
    Route::post('/add/level', 'CourseController@storeCourseLevel')->name('store.level');




    /*
    * Course Routes
    */

    Route::get('/courses', 'CourseController@course')->name('course');

    Route::get('/add/course', 'CourseController@addCourse')->name('add.course');
    Route::post('/add/course', 'CourseController@storeCourse')->name('store.course');


});
