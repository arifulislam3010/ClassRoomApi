<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassScheduleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedule_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thumbnail_id')->nullable()->unsigned();
            $table->integer('content_id')->nullable()->unsigned();
            $table->integer('class_schedule_id')->unsigned();
            $table->mediumText('summary')->nullable();
            $table->string('content_type')->nullable();
            $table->integer('order')->nullable();
            $table->longText('details')->nullable();
            $table->longText('assignment')->nullable();
            $table->longText('quiz')->nullable();
            $table->timestamps();
        });

        Schema::table('class_schedule_contents', function(Blueprint $table){
            $table->foreign('thumbnail_id')->references('id')->on('content_banks')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('content_id')->references('id')->on('content_banks')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('class_schedule_id')->references('id')->on('class_schedules')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedule_contents');
    }
}
