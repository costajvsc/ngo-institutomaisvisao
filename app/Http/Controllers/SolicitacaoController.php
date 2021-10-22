<?php


namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function index()
    {
        $solicitacao = Solicitacao::paginate(15);

        return view('dashboard', [
            'solicitacao' => $solicitacao
        ]);
    }
}
