<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes';

    protected $fillable = [
        'nome_paciente',
        'sobrenome_paciente',
        'telefone_fixo',
        'telefone_celular',
        'endereco',
        'rg_paciente',
        'cartaoSUS',
        'cartaoSUSNovo',
        'observacao',
        'urgencia',
        'data_procedimento',
        'senha_procedimento',
        'local_procedimento',
        'status',
        'procedimento',
        'id_user'
    ];
}
