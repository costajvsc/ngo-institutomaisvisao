<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoSolicitacao extends Model
{
    use HasFactory;

    protected $table = 'documentos_solicitacao';
    protected $primaryKey = 'id_doc';

    protected $fillable = [
        'id_doc',
        'file_path',
        'file_name',
        'id_solicitacao',
        'id_usuario'
    ];
}
