<?php 
Route::group(['middleware' => 'web','prefix' => 'class-room','namespace' => 'LaravelElms\ClassRoomApi\Http\Controllers\web'], function()
{
    Route::get('/','ClassRoomController@index')->name('class_room');
});
