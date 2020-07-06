<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id();       
            $table->string('nome',150);
            $table->string('telefone',11);
            $table->string('cpf',11)->unique();
            $table->string('rg')->unique();
            $table->string('cep');
            $table->string('cidade',150);
            $table->string('estado',150);
            $table->string('bairro',200);
            $table->integer('numero');
            $table->string('rua');
            $table->string('complemento',300);
            $table->date('data_admissao');
            $table->double('salario');
            $table->string('formacao');
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
        Schema::dropIfExists('professors');
    }
}
