<?php

/**
 * Home
 */

Route::get('/', 'HomeController@index')->name('home');

/**
 * Institutions
 */
Route::group(['prefix' => '/institutions/{institutionType}'], function() {

    /**
     * Real-time dropdown search
     */
    Route::get('/search', 'InstitutionsController@rtSearch');

    Route::get('', 'InstitutionsController@index')->name('institutions.index');
    Route::get('/{institution}', 'InstitutionsController@show')->name('institutions.show');

});

/**
 * Specialties
 */

Route::get('/specialties/directions/{direction}', 'SpecialtiesController@index')->name('specialties.index');
Route::get('/specialties/{specialty}', 'SpecialtiesController@show')->name('specialties.show');

/**
 * Specialty Direction Groups
 */

Route::get('/specialty-directions', 'SpecialtyDirectionsController@index')->name('specialties.directions.index');
Route::get('/specialty-directions/{group}', 'SpecialtyDirectionsController@show')->name('specialties.directions.show');

/**
 * UNT
 */

Route::get('/ent', 'UNTController@index')->name('ent');

Route::get('/testent', 'UNTController@testent')->name('testent');

/**
 * Subjects
 */

Route::get('/subjects/{subject}', 'SubjectsController@show')->name('subjects.show');

/**
 * Articles
 */

Route::get('articles/{article}', 'ArticlesController@show')->name('articles.show');


/**
 * Professions
 */

Route::get('/professions/{profession}', 'ProfessionsController@show')->name('professions.show');


/**
 * Feedback
 */

Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');
