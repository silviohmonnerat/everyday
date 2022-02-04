<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('content');
            $table->string('catalogue_number');
            $table->string('sound_type');
            $table->string('date');
            $table->string('season');
            $table->string('time_of_day');
            $table->string('type_of_location');
            $table->string('location');
            $table->string('recordist');
            $table->string('artist');
            $table->string('length');
            $table->string('device_recorder');
            $table->string('format_quality');
            $table->string('access_and_license');
            $table->string('tags');
            $table->string('media');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archives');
    }
}
