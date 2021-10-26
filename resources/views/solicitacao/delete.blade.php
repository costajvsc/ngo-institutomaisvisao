@extends('../layout/_layout')
@section('title') Solicitação @endsection


@section('content')
<div class="d-flex justify-content-between mt-2">
    <h3> Excluir Solicitação #{{$solicitacao->id}}</h3>
    <span class="badge rounded-pill bg-secondary p-2">{{$solicitacao->status}}</span>
</div>
<h5>Tem certeza que deseja excluir esse registro? Todos os dados <span class="text-danger">serão perdidos</span>.</h5>
<p><span class="fw-bold">Nome do paciente</span> {{$solicitacao->nome_paciente}}</p>
<p><span class="fw-bold">Sobrenome do paciente</span> {{$solicitacao->sobrenome_paciente}}</p>
<p><span class="fw-bold">Telefone fixo</span> {{"(".substr($solicitacao->telefone_fixo,0,2).") ".substr($solicitacao->telefone_fixo,2,-4)."-".substr($solicitacao->telefone_fixo,-4)}}</p>
<p><span class="fw-bold">Telefone celular</span> {{"(".substr($solicitacao->telefone_celular,0,2).") ".substr($solicitacao->telefone_celular,2,-4)."-".substr($solicitacao->telefone_celular,-4)}}</p>
<p><span class="fw-bold">Endereco</span> {{$solicitacao->endereco}}</p>
<p><span class="fw-bold">RG do paciente</span> {{$solicitacao->rg_paciente}}</p>
<p><span class="fw-bold">CPF do paciente</span> {{$solicitacao->cpf_paciente}}</p>
<p><span class="fw-bold">Cartão SUS do paciente</span> {{$solicitacao->cartaoSUS}}</p>
<p><span class="fw-bold">Novo Cartão SUS do paciente (Salvador)</span> {{$solicitacao->cartaoSUSNovo}}</p>
<p><span class="fw-bold">Procedimento</span> {{$solicitacao->procedimento}}</p>
<p><span class="fw-bold">Urgencia</span> {{$solicitacao->urgencia ? 'Urgência' : 'Procedimento normal'}}</p>
<p><span class="fw-bold">Data do procedimento</span> {{date_format(new DateTime($solicitacao->data_procedimento), 'd/m/Y')}}</p>
<p><span class="fw-bold">Local do procedimento</span> {{$solicitacao->senha_procedimento}}</p>
<p><span class="fw-bold">Senha do procedimento</span> {{$solicitacao->senha_procedimento}}</p>
<p><span class="fw-bold">Nome do paciente</span> {{$solicitacao->nome_paciente}}</p>

<form action="/solicitacao/delete" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{$solicitacao->id}}">
    <div class="d-flex justify-content-end">
        <a href="/dashboard" class="btn btn-outline-secondary ms-2"><i class="fas fa-list"></i> Todos os procedimentos</a>
        <a href="/solicitacao/{{$solicitacao->id}}" class="btn btn-outline-warning ms-2"><i class="fas fa-file-medical"></i> Voltar para registro</a>
        <button type="submit" class="btn btn-outline-danger ms-2"><i class="fas fa-trash-alt"></i> Excluir registro</button>
    </div>
</form>

@endsection
