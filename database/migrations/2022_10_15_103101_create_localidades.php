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
        Schema::create('localidades', function (Blueprint $table) {
            $table->id();
            
            // $table->string('titulo')->unique();
            $table->string('titulo');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero', 20)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade');
            $table->string('uf');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->unsignedBigInteger('localidade_tipo_id')->nullable();
            // $table->unsignedBigInteger('responsavel_id')->nullable();

            $table->timestamps();
            $table->softdeletes();


            $table->foreign('localidade_tipo_id')->references('id')->on('localidade_tipos');
            // $table->foreign('responsavel_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('localidades', function (Blueprint $table) {
            // $table->dropForeign(['tipo_localidades_id']);
        });

        Schema::dropIfExists('localidades');
    }
};
