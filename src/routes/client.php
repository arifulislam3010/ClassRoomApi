<?php 
Route::group(['middleware' => 'client','prefix' => 'client-api/class-room','namespace' => 'LaravelElms\ClassRoomApi\Http\Controllers\client'], function()
{
    Route::get('/departments/{partner_id}','ClassRoomController@departments')->name('departments');
    Route::get('/department/{department_id}/sessions','ClassRoomController@sessions')->name('sessions');

    Route::get('/classes','ClassRoomController@classes')->name('class');
});
