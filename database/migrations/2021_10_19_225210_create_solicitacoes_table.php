<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_paciente', 50);
            $table->string('sobrenome_paciente', 50);
            $table->string('telefone_fixo', 10)->nullable();
            $table->string('telefone_celular', 11)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('rg_paciente', 20)->nullable();
            $table->string('cpf_paciente', 11)->nullable();
            $table->string('cartaoSUS', 20)->nullable();
            $table->string('cartaoSUSNovo', 20)->nullable();
            $table->string('observacao', 255)->nullable();
            $table->boolean('urgencia')->default(false);
            $table->dateTime('data_procedimento')->nullable();
            $table->string('senha_procedimento', 255)->nullable();
            $table->string('local_procedimento', 255)->nullable();
            $table->enum('status', ['Solicitação cadastrada', 'Trocar cartão SUS', 'Liberar para agendamento','Agendar procedimento', 'Procedimento agendado', 'Pendência documental', 'Pendência Cartão SUS novo'])->default('Solicitação cadastrada');
            $table->enum('procedimento', ['Catarata', 'Pterígio', 'Glaucoma', 'Retina', 'Outros'])->default('Outros');
            $table->boolean('deleted')->default(false);
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('solicitacoes');
    }
}
