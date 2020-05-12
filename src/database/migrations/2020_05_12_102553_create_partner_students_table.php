<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_identity_no')->nullable();
            $table->integer('user_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('partner_students', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_students');
    }
}
