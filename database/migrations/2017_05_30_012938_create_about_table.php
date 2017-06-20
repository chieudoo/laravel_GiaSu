<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giasu_about', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('address');
            $table->text('gioithieu');
            $table->text('dichvu');
            $table->text('lienhe');
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
        Schema::dropIfExists('giasu_about');
    }
}
