<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentoSolicitacao;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function delete(Request $request)
    {
        $document = DocumentoSolicitacao::findOrFail($request->id_doc);

        return view('solicitacao/delete-document', [
            'document' => $document,
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id_doc;
        $document = DocumentoSolicitacao::findOrFail($id);

        if((!Storage::delete($document->file_path)) || (!DocumentoSolicitacao::destroy($id)))
            return redirect('solicitacao/'.$document['id_solicitacao'])->withErrors('Erro ao excluir documento');

        return redirect('solicitacao/'.$document['id_solicitacao'])->with('warning', 'O documento foi excluído com sucesso');
    }
}
