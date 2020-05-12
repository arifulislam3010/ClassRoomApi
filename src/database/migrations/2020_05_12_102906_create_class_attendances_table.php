<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('class_schedule_id')->unsigned();
            $table->integer('class_schedule_content_id')->unsigned();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->float('completeness',8,2)->default(0);
            $table->timestamps();
        });

        Schema::table('class_attendances', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_schedule_id')->references('id')->on('class_schedules')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_schedule_content_id')->references('id')->on('class_schedule_contents')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_attendances');
    }
}
