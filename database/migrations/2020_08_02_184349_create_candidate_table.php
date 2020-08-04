<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->length(40);
            $table->string('last_name')->length(40);
            $table->string('email')->length(100);
            $table->string('contact_number')->length(100);
            $table->integer('gender')->length(1);
            $table->string('specialization')->length(200);
            $table->integer('work_ex_year');
            $table->integer('candidate_dob');
            $table->string('address')->length(500);
            $table->string('resume')->length(255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate');
    }
}
