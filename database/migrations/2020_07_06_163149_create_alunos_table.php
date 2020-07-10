<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',150);
            $table->string('telefone',11);
            $table->string('cpf',11)->unique();
            $table->string('rg')->unique();
            $table->string('email')->unique();
            $table->date('data_nascimento');
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
