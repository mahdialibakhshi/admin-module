<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title_fa',255)->nullable();
            $table->string('title_en',255);
            $table->text('description_fa',6000)->nullable();
            $table->text('description_en',6000)->nullable();
            $table->text('short_description_fa')->nullable();
            $table->text('short_description_en')->nullable();
            $table->string('image',255)->nullable();
            $table->string('alias')->unique();
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
        Schema::dropIfExists('projects');
    }
}
