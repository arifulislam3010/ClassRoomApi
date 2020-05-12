<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug_name');
            $table->integer('thumbnail_id')->nullable()->unsigned();
            $table->mediumText('description')->nullable();
            $table->integer('department_id')->nullable()->unsigned();
            $table->integer('session_id')->nullable()->unsigned();
            $table->mediumText('details')->nullable();
            $table->date('publish_date')->nullable();
            $table->string('period')->nullable();
            $table->boolean('status')->default(true)->comments('0 for unpublished, 1 for published');
            $table->boolean('restricted')->default(false)->comments('0 for non restricted, 1 for restricted');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('partner_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('class_rooms', function(Blueprint $table){
            $table->foreign('thumbnail_id')->references('id')->on('content_banks')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('session_id')->references('id')->on('department_sessions')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('partner_id')->references('id')->on('institution_infos')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_rooms');
    }
}
