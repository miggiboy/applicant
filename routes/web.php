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











Route::get('/wellpaidworld', function () {
    return view('wellpaidworld');
});

Route::get('/wellpaidkz', function () {
    return view('wellpaidkz');
});


Route::get('/mostwantedworld', function () {
    return view('mostwantedworld');
});
Route::get('/mostwantedkz', function () {
    return view('mostwantedkz');
});

Route::get('/testent', function () {
    return view('testent');
});


Route::get('/grant', function () {
    return view('grant');
});

Auth::routes();

/**
 * Feedback
 */

Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');


