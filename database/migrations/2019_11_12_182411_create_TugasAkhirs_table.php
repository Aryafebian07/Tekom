<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTugasAkhirsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TugasAkhirs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nim')->nullable();
            $table->string('nama')->nullable();
            $table->string('judul')->nullable();
            $table->string('file')->nullable();
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
        Schema::drop('TugasAkhirs');
    }
}
