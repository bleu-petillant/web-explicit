<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('desc')->nullable();
            $table->string('slug');
            $table->integer('course_id')->nullable();
            $table->string('first_url')->nullable();
            $table->string('second_url')->nullable();
            $table->string('pdf')->nullable();
            $table->string('image');
            $table->string('alt')->nullable();
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
        Schema::dropIfExists('resources');
    }
}
