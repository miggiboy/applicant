<?php

/**
 * Home
 */

Route::get('/', 'HomeController@index')->name('home');

/**
 * Institutions
 */
Route::group(['prefix' => '/institutions/{institutionType}'], function() {

    Route::get('', 'InstitutionsController@index')->name('institutions.index');

});

Route::get('/wellpaidworld', function () {
    return view('wellpaidworld');
});

Route::get('/wellpaidkz', function () {
    return view('wellpaidkz');
});

/**
 * Subjects
 */

Route::get('/predmety/{subject}', 'SubjectsController@show')->name('subject.show');



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

Route::get('/vuzy', 'UniversitiesController@index')->name('universitiess');

Route::get('/vuz', 'UniversitiesController@index')->name('universities');
Route::get('/universities/{university}', 'UniversitiesController@show')
    ->name('vuz_profile');

Route::get('/specialities/{specialty}/institutions', 'SpecialtyInstitutionsController@index')->name('linked_specialities');

Route::get('/universities/autocomplete/search', 'UniversitiesController@autocomplete')
    ->name('universities.autocomplete');

Route::get('/colleges/autocomplete/search', 'UniversitiesController@autocompleteCollege')
    ->name('colleges.autocomplete');

Route::get('/colleges/search', 'UniversitiesController@searchCollege')
    ->name('colleges.search');

Route::get('/colleges/{college}', 'UniversitiesController@showCollege')
    ->name('college_profile');

Route::get('/college', 'UniversitiesController@indexCollege')->name('colleges');

Route::get('/professions/{profession}', 'Professions\ProfessionsController@show')->name('profession.show');

Route::get('/specialities', function () {
    return view('specialities');
});
Route::get('articles/{article}', 'ArticlesController@show')->name('article');
Route::get('/vuzy_search', 'UniversitiesController@search')
    ->name('vuzy_search');
Route::get('/ent', function () {
    return view('ent');
});


Auth::routes();

/**
 * Feedback
 */

Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');


