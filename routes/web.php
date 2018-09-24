<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/resume', 'Site\ResumeController@index')->name('resume.index');
Route::get('/resume/{resume}', 'Site\ResumeController@show')->name('resume.show');
Route::get('/resume/create', 'Site\ResumeController@create')->name('resume.create');
Route::post('/resume', 'Site\ResumeController@store')->name('resume.store');


Route::get('/resume/create/profile', 'Site\ResumeController@createProfile')->name('resume.create.profile');
Route::post('/resume/create/profile', 'Site\ResumeController@storeProfile')->name('resume.store.profile');

Route::get('/resume/create/experience/{experience?}', 'Site\ResumeController@createExperience')->name('resume.create.experience');
Route::post('/resume/create/experience/{experience?}', 'Site\ResumeController@storeExperience')->name('resume.store.experience');

Route::get('/resume/create/education/{education?}', 'Site\ResumeController@createEducation')->name('resume.create.education');
Route::post('/resume/create/education/{education?}', 'Site\ResumeController@storeEducation')->name('resume.store.education');

Route::get('/resume/create/skill/{skill?}', 'Site\ResumeController@createSkill')->name('resume.create.skill');
Route::post('/resume/create/skill/{skill?}', 'Site\ResumeController@storeSkill')->name('resume.store.skill');

Route::get('/resume/create/language/{language?}', 'Site\ResumeController@createLanguage')->name('resume.create.language');
Route::post('/resume/create/language/{language?}', 'Site\ResumeController@storeLanguage')->name('resume.store.language');

Route::get('/resume/create/hobby/{hobby?}', 'Site\ResumeController@createHobby')->name('resume.create.hobby');
Route::post('/resume/create/hobby/{hobby?}', 'Site\ResumeController@storeHobby')->name('resume.store.hobby');
