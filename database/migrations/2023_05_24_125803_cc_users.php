<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_users', function (Blueprint $table) {
            $table->unsignedBigInteger('centro_de_custo_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('centro_de_custo_id')->references('id')->on('centro_de_custos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cc_users', function (Blueprint $table) {
            $table->dropForeign(['centro_de_custo_id']);
            $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('cc_users');
    }
};
