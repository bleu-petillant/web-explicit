<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('desc');
            $table->string('slug');
            $table->string('image');
            $table->string('alt')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('resources_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('published_at')->nullable();
            $table->string('meta')->nullable();
            $table->unsignedTinyInteger('activated')->default(0);
            $table->unsignedTinyInteger('validate')->default(0);
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
        Schema::dropIfExists('courses');

    }
}
