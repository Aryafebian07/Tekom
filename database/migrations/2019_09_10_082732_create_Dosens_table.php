<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDosensTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dosens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nidn');
            $table->string('name_dosen')->nullable();
            $table->string('expertise')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
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
        Schema::drop('Dosens');
    }
}
