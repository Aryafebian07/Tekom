<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFocusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Focus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prodi_id')->nullable();
            $table->string('name_focus')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_color')->nullable();
            $table->text('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Focus');
    }
}
