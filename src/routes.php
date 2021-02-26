<?php

Route::get('/yacrudg', 'Swtysweater\Yacrudg\YacrudgController@index')
->name('yacrudg')->middleware('web', 'auth');
Route::get('/yacrudg/show/{controller}', 'Swtysweater\Yacrudg\YacrudgController@info')
->name('yacrudgTable')->middleware('web', 'auth');
Route::get('/yacrudg/destroy/{controller}/{id}', 'Swtysweater\Yacrudg\YacrudgController@destroyData')
->name('yacrudgRemove')->middleware('web', 'auth');
Route::get('/yacrudg/update/{controller}/{id}', 'Swtysweater\Yacrudg\YacrudgController@updateData')
->name('yacrudgUpdate')->middleware('web', 'auth');
Route::post('/yacrudg/update/{controller}/{id}', 'Swtysweater\Yacrudg\YacrudgController@updateSubmitData')
->name('yacrudgUpdateSubmit')->middleware('web', 'auth');
Route::get('/yacrudg/new/', 'Swtysweater\Yacrudg\YacrudgController@createCRUD')
->name('yacrudgNew')->middleware('web', 'auth');
Route::post('/yacrudg/new/', 'Swtysweater\Yacrudg\YacrudgController@createCRUDSubmit')
->name('yacrudgNewSubmit')->middleware('web', 'auth');
Route::get('/yacrudg/newrow/{controller}', 'Swtysweater\Yacrudg\YacrudgController@createRow')
->name('yacrudgNewRow')->middleware('web', 'auth');
Route::post('/yacrudg/newrow/{controller}', 'Swtysweater\Yacrudg\YacrudgController@createRowSubmit')
->name('yacrudgNewRowSubmit')->middleware('web', 'auth');
Route::get('/yacrudg/remove/{controller}', 'Swtysweater\Yacrudg\YacrudgController@removeCRUD')
->name('yacrudgRemoveCRUD')->middleware('web', 'auth');