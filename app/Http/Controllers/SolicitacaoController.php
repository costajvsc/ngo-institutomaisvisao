<?php


namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function index()
    {
        $solicitacoes = Solicitacao::where('deleted', 0)->paginate(15);

        return view('dashboard', [
            'solicitacoes' => $solicitacoes
        ]);
    }

    public function create()
    {
        return view('solicitacao/create');
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        $data['id_user'] =  Auth::user()->id;

        if(!Solicitacao::create($data))
            return redirect('/dashboard')->withErrors('Um erro ocorreu ao criar a solicitação do paciente'.$data['nome_paciente'].'.');

        return redirect('/dashboard')->with('warning', 'A solicitação do paciente '.$data['nome_paciente'].' foi criada com sucesso.');
    }

    public function find(Request $request)
    {
        $id = $request['id'];
        $solicitacao = Solicitacao::where('id', $id)->first();

        return view('solicitacao/index', [
            'solicitacao' => $solicitacao
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request['id'];
        $solicitacao = Solicitacao::where('id', $id)->first();

        return view('solicitacao/edit', [
            'solicitacao' => $solicitacao
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        if(!Solicitacao::where('id', $request->id)->update($data))
            return redirect('/dashboard')->withErrors('Um erro ocorreu ao atualizada a solicitação do paciente'.$data['nome_paciente'].'.');

        return redirect('/dashboard')->with('warning', 'A solicitação do paciente '.$data['nome_paciente'].' foi atualizada com sucesso.');

    }

    public function delete(Request $request)
    {
        $id = $request['id'];
        $solicitacao = Solicitacao::where('id', $id)->first();

        return view('solicitacao/delete', [
            'solicitacao' => $solicitacao
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request['id'];
        $solicitacao = Solicitacao::where('id', $id)->first();

        $solicitacao->deleted = true;
        $solicitacao->deleted_at = date("Y-m-d H:i:s");

        if(!$solicitacao->save())
            return redirect('/dashboard')->withErrors('Um erro ocorreu ao excluir a solicitação do paciente'.$solicitacao['nome_paciente'].'.');

        return redirect('/dashboard')->with('warning', 'A solicitação do paciente '.$solicitacao['nome_paciente'].' foi excluida com sucesso.');


        return redirect('/dashboard');
    }
}
