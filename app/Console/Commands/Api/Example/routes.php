/*
* _REPLACE_oc Routes
*/
Route::get('_REPLACE_m/actives', '_REPLACE_mcController@actives');
Route::resource('_REPLACE_m', '_REPLACE_mcController');
Route::delete('_REPLACE_m', '_REPLACE_mcController@destroys');
Route::get('_REPLACE_m/{id}/active', '_REPLACE_mcController@active');

//Add_Here