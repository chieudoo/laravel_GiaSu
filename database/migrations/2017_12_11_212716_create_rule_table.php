<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giasu_rule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('chucnang_id');
            $table->integer('rule_add')->default(0);
            $table->integer('rule_edit')->default(0);
            $table->integer('rule_delete')->default(0);
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
        Schema::dropIfExists('giasu_rule');
    }
}
