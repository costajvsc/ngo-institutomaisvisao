<?php


namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\DocumentoSolicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        if(!is_null($status))
            return view('dashboard', [
                'solicitacoes' => Solicitacao::where([
                    ['deleted', '=', false],
                    ['urgencia', '=', false],
                    ['status', '=', $status],
                    ['responsavel', '=', Auth::user()->id]
                ])->orWhere( function($query) {
                    $query->where('status', 'Solicitação cadastrada')
                          ->where('resp_sec_municipal', '=', Auth::user()->id);
                })->paginate(15),

                'urgencias' => Solicitacao::where([
                    ['deleted', '=', false],
                    ['urgencia', '=', true],
                    ['status', '=', $status]
                ])->get()
            ]);


        return view('dashboard', [
            'solicitacoes' => Solicitacao::where([
                ['deleted', '=', false],
                ['urgencia', '=', false],
            ])->paginate(15),
            'urgencias' => Solicitacao::where([
                ['deleted', '=', false],
                ['urgencia', '=', true],
            ])->get()
        ]);
    }

    public function create()
    {
        return view('solicitacao/create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = $request->except(['_token', '_method']);
        $data['resp_sec_municipal'] = $user_id;

        $created = Solicitacao::create($data);

        if(!$created)
            return redirect('/dashboard')->withErrors('Um erro ocorreu ao criar a solicitação do paciente'.$data['nome_paciente'].'.');

        if($request->hasfile('documents'))
        {
            foreach($request->file('documents') as $file)
            {
                $fileName = $file->store('/documents');
                DocumentoSolicitacao::create([
                    "file_path" => $fileName,
                    "file_name" => $file->getClientOriginalName(),
                    "id_solicitacao" => $created->id,
                    "id_usuario" => $user_id
                ]);
            }
        }

        return redirect('/dashboard')->with('success', 'A solicitação do paciente '.$data['nome_paciente'].' foi criada com sucesso.');
    }

    public function find(Request $request)
    {
        $id = $request['id'];
        $solicitacao = null;

        if(!is_null($request->status)){
            $solicitacao = Solicitacao::where([
                ['id', '=' ,$request->id],
                ['status', '=', $request->status],
                ['responsavel', '=', Auth::user()->id]
            ])->orWhere( function($query) {
                $query->where('status', 'Solicitação cadastrada')
                      ->where('resp_sec_municipal', '=', Auth::user()->id);
            })->first();
        }
        else
            $solicitacao = Solicitacao::where('id', '=' ,$request->id)->first();

        $documents = DocumentoSolicitacao::where('id_solicitacao', $id)->get();

        return view('solicitacao/index', [
            'solicitacao' => $solicitacao,
            'documents' => $documents
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
        $data = $request->except(['_token', '_method', 'documents']);
        if(!is_null($request->next_step))
            $data['status'] = $request->next_step;

        $updated = Solicitacao::where('id', $request->id)->update($data);

        if(!$updated)
            return redirect('/dashboard')->withErrors('Um erro ocorreu ao atualizada a solicitação do paciente'.$data['nome_paciente'].'.');

        if($request->hasfile('documents'))
        {
            foreach($request->file('documents') as $file)
            {
                $fileName = $file->store('/documents');
                DocumentoSolicitacao::create([
                    "file_path" => $fileName,
                    "file_name" => $file->getClientOriginalName(),
                    "id_solicitacao" => $data['id'],
                    "id_usuario" => Auth::user()->id
                ]);
            }
        }

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
    }

    public function release(Request $request)
    {
        $etapa = $request->etapa == 'cadastrada' ? 'Solicitação cadastrada' : 'Liberar para agendamento';
        $user_type = $request->etapa == 'cadastrada' ? 'Setor de documentos' : 'Central de agendamento';
        $user_field = $request->etapa == 'cadastrada' ? 'resp_set_documentos' : 'resp_cen_agendamento';

        $usuarios = \App\Models\User::where('user_type', $user_type)->get();
        $solicitacoes = Solicitacao::where('status', '=', $etapa)->get();

        return view('solicitacao/atribuir-solicitacao',[
            'solicitacoes' => $solicitacoes,
            'usuarios' => $usuarios,
            'user_type' => $user_field
        ]);
    }

    public function release_update(Request $request)
    {
        $status = $request->user_type == 'resp_set_documentos' ? 'Trocar cartão SUS' : 'Agendar procedimento';

        foreach ($request->solicitacoes as $id) {
            $solicitacao = Solicitacao::findOrFail($id);
            $solicitacao->status = $status;
            $solicitacao->responsavel = $request->responsavel;

            $solicitacao->save();
        }

        return redirect('/dashboard')->with('warning', 'As solicitações foram atribuidas com sucesso.');
    }
}
