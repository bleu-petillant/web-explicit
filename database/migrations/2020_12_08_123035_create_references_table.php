<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('desc')->nullable();
            $table->string('slug');
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('link')->nullable();
            $table->string('pdf')->nullable();
            $table->string('image');
            $table->string('meta');
            $table->string('alt')->nullable();
            $table->foreignId('teacher_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->date('published_at')->nullable();
            $table->string('duration')->nullable()->default('10 min');
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
        Schema::dropIfExists('references');
    }
}
