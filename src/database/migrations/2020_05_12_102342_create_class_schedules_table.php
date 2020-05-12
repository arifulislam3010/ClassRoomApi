<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('summary')->nullable();
            $table->boolean('status')->default(true)->comments('0 for unpublished, 1 for published');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->integer('class_room_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('class_schedules', function(Blueprint $table){
            $table->foreign('class_room_id')->references('id')->on('class_rooms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedules');
    }
}
