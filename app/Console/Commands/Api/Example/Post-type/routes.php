/*
* _REPLACE_oc Category Routes
*/
Route::get('_REPLACE_o-categories/actives', '_REPLACE_ocCategoriesController@actives');
Route::resource('_REPLACE_o-categories', '_REPLACE_ocCategoriesController');
Route::delete('_REPLACE_o-categories', '_REPLACE_ocCategoriesController@destroys');
Route::get('_REPLACE_o-categories/{id}/active', '_REPLACE_ocCategoriesController@active');
/*
* _REPLACE_oc Routes
*/
Route::get('_REPLACE_m/actives', '_REPLACE_mcController@actives');
Route::resource('_REPLACE_m', '_REPLACE_mcController');
Route::delete('_REPLACE_m', '_REPLACE_mcController@destroys');
Route::get('_REPLACE_m/{id}/active', '_REPLACE_mcController@active');

//Add_Here