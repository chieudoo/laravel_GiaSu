<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhancongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giasu_phancong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hv_id');
            $table->string('mon_hoc');
            $table->integer('gv_id');
            $table->date('ngay_bd');
            $table->boolean('status')->default(0);
            $table->string('money');
            $table->integer('sobuoi');
            $table->integer('trangthai')->default(0);
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
        Schema::dropIfExists('giasu_phancong');
    }
}
