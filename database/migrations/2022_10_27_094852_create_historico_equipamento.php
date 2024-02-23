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
        Schema::create('historico_equipamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atividade_id');
            $table->unsignedBigInteger('equipamento_id');
            $table->unsignedBigInteger('responsavel_id');
            $table->timestamps();

            $table->foreign('atividade_id')->references('id')->on('atividades');
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
        Schema::table('historico_equipamentos', function (Blueprint $table){
        $table->dropForeign(['atividade_id']);
        $table->dropForeign(['equipamento_id']);
        $table->dropForeign(['responsavel_id']);
        });
        

        Schema::dropIfExists('historico_equipamentos');
    }
};
