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
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_mov_id');
            $table->string('motivo_movimentacao');
            $table->unsignedBigInteger('responsavel_id');
            $table->unsignedBigInteger('equipamento_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipo_mov_id')->references('id')->on('tipo_movimentacao');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
            $table->foreign('responsavel_id')->references('id')->on('users');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('movimentacoes', function (Blueprint $table) {
            $table->dropForeign(['equipamento_id']);
            $table->dropForeign(['responsavel_id']);
            $table->dropForeign(['tipo_mov_id']);
        });
        
        Schema::dropIfExists('movimentacoes');
    }
};
