<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('url');
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('previous')->nullable();
            $table->unsignedBigInteger('next')->nullable();
            $table->unsignedBigInteger('series_id');
            $table->timestamps();

            $table->foreign('previous')->references('id')->on('videos')->onDelete('set null');
            $table->foreign('next')->references('id')->on('videos')->onDelete('set null');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
