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
Route::group(['prefix' => '/{institutionType}-specialties'], function () {

    Route::get('', 'SpecialtiesController@index')->name('specialties.index');
    Route::get('/{specialty}', 'SpecialtiesController@show')->name('specialties.show');

});


/**
 * UNT
 */

Route::get('/ent', 'UNTController@index')->name('ent');

/**
 * Subjects
 */

Route::get('/subjects/{subject}', 'SubjectsController@show')->name('subjects.show');

















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
Route::get('/educationandgum', function () {
    return view('educationandgum');
});

Route::get('/serviceandsociety', function () {
    return view('serviceandsociety');
});
Route::get('/natural', function () {
    return view('natural');
});
Route::get('/serviceandsocietyc', function () {
    return view('serviceandsocietyc');
});
Route::get('/technique', function () {
    return view('technique');
});
Route::get('/agriculture', function () {
    return view('agriculture');
});
Route::get('/mandatorysubjects', function () {
    return view('mandatorysubjects');
});
Route::get('/grant', function () {
    return view('grant');
});
Route::get('/professions_list', 'Professions\ProfessionsController@index')->name('professions_list');

Route::get('/professions/{profession}', 'Professions\ProfessionsController@show')->name('profession.show');
Route::get('/professions/search', 'Professions\ProfessionsController@search')
    ->name('professions.search');
Route::get('/professions', function () {
    return view('professions');
});
// Route::get('/art', 'SpecialitiesController@art')->name('specialities');

// Route::get('/techniq', 'SpecialitiesController@techniq')->name('specialities');

Route::get('/specialitieslist/{direction}', 'SpecialitiesController@specialitieslist')
	->name('specialitieslist');
Route::get('/professionslist/{direction}', 'Professions\ProfessionsController@proflist')
	->name('professionslist');

 Route::group(['prefix' => 'specialties/search'], function () {
        Route::get('', 'SpecialitiesController@search')->name('specialties.search');
        Route::get('/autocomplete', 'SpecialtiesController@autocomplete')->name('specialties.autocomplete');
    });
Route::get('/specialities/{speciality}', 'SpecialitiesController@show')->name('specialities.show');
Route::get('/specialities_search', 'SpecialitiesController@search')
    ->name('specialities_search');

Route::get('/specialities/{specialty}/institutions', 'SpecialtyInstitutionsController@index')->name('linked_specialities');

Route::get('/professions/{profession}', 'Professions\ProfessionsController@show')->name('profession.show');

Route::get('/specialities', function () {
    return view('specialities');
});
Route::get('articles/{article}', 'ArticlesController@show')->name('article');

Auth::routes();

/**
 * Feedback
 */

Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');


