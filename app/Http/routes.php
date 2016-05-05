<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'UserController@logout');

//Курсы
Route::get('courses', 'CoursesController@index');
Route::get('courses/newcourse', 'CoursesController@create');
Route::get('course{id}/changeCourse', 'CoursesController@show');
Route::get('courses/grade', 'CoursesController@showGrade');

Route::get('lol', 'CoursesController@lol');

//Лекции
//Route::get('course/lectionsAll', 'LectionsController@showAll');
Route::get('course{id}/lections', 'LectionsController@show');
Route::get('course{id}/lections/{lid}', 'LectionsController@showOneLection');


//Авторизация
Route::post('courses', 'UserController@postLogin');

//Add
Route::post('courses/addCourse', 'CoursesController@store');
Route::post('courses/addLogo', 'CoursesController@addLogo');
Route::post('course{id}/addLection', 'LectionsController@store');
Route::post('lections/addTable', 'GuidesController@store');
Route::post('addMessage', 'MessagesController@store');
Route::post('addHomework', 'HomeworkController@store');

//Change
Route::post('course{id}/edit', 'CoursesController@edit');
Route::post('courses/toggleLiked', 'CoursesController@toggleLiked');
Route::post('lections/{id}/changeLecDesc', 'LectionsController@edit');

//Delete
Route::post('course{cid}/lections', 'LectionsController@destroy');
Route::post('lections/{id}/removeTable', 'GuidesController@destroy');
Route::post('courses/removeLiked', 'CoursesController@destroyLiked');
