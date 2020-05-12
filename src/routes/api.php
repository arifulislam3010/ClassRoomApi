<?php 
Route::group(['middleware' => 'auth:api','prefix' => 'api/class-room','namespace' => 'LaravelElms\ClassRoomApi\Http\Controllers\api'], function()
{
    Route::get('/','ClassRoomController@index')->name('class_room');
});
