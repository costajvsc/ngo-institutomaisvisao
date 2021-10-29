@extends('../layout/_layout')
@section('title') Documentação @endsection


@section('content')
<div class="d-flex justify-content-between mt-2">
    <h3> Excluir documento #{{$document->id_doc}}</h3>
</div>
<h5>Tem certeza que deseja excluir esse documennto? Todos os dados <span class="text-danger">serão perdidos</span>.</h5>
<p><span class="fw-bold">Nome do arquivo</span> {{$document->file_name}}</p>

<form action="/solicitacao/document/delete" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id_doc" value="{{$document->id_doc}}">
    <div class="d-flex justify-content-end">
        <a href="/dashboard" class="btn btn-outline-secondary ms-2"><i class="fas fa-list"></i> Todos os procedimentos</a>
        <a href="/solicitacao/{{$document->id_solicitacao}}" class="btn btn-outline-warning ms-2"><i class="fas fa-file-medical"></i> Voltar para registro</a>
        <button type="submit" class="btn btn-outline-danger ms-2"><i class="fas fa-trash-alt"></i> Excluir documento</button>
    </div>
</form>

@endsection
