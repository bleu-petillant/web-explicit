<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id')->nullable();                   
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedTinyInteger('activated')->default(0);
            $table->unsignedInteger('question_position')->default(1);
            $table->unsignedTinyInteger('validate')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('course_user');
    }
}
