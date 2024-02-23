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
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);
            $table->string('descricao', 300);
            $table->double('valor_equipamento', 8, 2);
            $table->string('numero_serie');
            $table->string('patrimonio')->nullable();
            $table->unsignedBigInteger('centro_de_custo_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('nota_fiscal_id')->nullable();
            $table->timestamps();
            $table->softdeletes();
            
            $table->foreign('centro_de_custo_id')->references('id')->on('centro_de_custos');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('marca_id')->references('id')->on('marcas');
            // $table->foreign('nota_fiscal_id')->references('id')->on('notas_fiscais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropForeign(['centro_de_custo_id']);
            $table->dropForeign(['tipo_id']);
            $table->dropForeign(['marca_id']);
            // $table->dropForeign(['nota_fiscal_id']);
        });
        
        Schema::dropIfExists('equipamentos');
    }
};
