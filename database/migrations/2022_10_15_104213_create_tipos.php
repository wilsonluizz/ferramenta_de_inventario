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
        Schema::create('tipos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50);                           // Convencionado que esse campo sempre vai se chamar título
            $table->unsignedBigInteger('categoria_id');             // Adiciona campo para receber chave estrangeira
            $table->timestamps();
            $table->softdeletes();

            // CRIA A CHAVE ESTRANGEIRA
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipos', function (Blueprint $table) {
            $table->dropForeign(['categoria_id']);
        });
        
        Schema::dropIfExists('tipos');
    }
};
