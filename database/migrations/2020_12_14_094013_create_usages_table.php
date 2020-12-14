<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('desc')->nullable();
            $table->string('slug');
            $table->string('link')->nullable();
            $table->string('image');
            $table->string('meta');
            $table->string('alt')->nullable();
            $table->foreignId('teacher_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('published_at')->nullable();
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
        Schema::dropIfExists('usages');
    }
}
