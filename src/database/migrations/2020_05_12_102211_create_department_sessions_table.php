<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('status')->default(true)->comments('0 for unpublished, 1 for published');
            $table->mediumText('summary')->nullable();
            $table->integer('department_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('department_sessions', function(Blueprint $table){
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_sessions');
    }
}
