<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosSolicitacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_solicitacao', function (Blueprint $table) {
            $table->bigIncrements('id_doc');
            $table->string('file_path');
            $table->string('file_name');
            $table->unsignedBigInteger('id_solicitacao');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_solicitacao')->references('id')->on('solicitacoes');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('documentos_solicitacao');
    }
}
