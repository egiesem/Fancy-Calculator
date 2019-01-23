<?php




Route::get('/', 'CalcController@index')
        ->name('home');
Route::resource('/historyadd', 'CalcController');

Route::get('/getallhistories', 'CalcController@getall');
Route::get('/getmyhistories', 'CalcController@getmy');
Route::delete('/clean/{id}', 'CalcController@clean');
Route::get('/spesifik/{id}', 'CalcController@spesifik');
Route::put('/updates/{id}', 'CalcController@updates');
Route::delete('/cleanallmy', 'CalcController@cleanallmy');
Route::delete('/cleanall', 'CalcController@cleanall');
