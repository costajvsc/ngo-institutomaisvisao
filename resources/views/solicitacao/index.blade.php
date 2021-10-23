@extends('../layout/_layout')
@section('title') Solicitação @endsection


@section('content')
<div class="d-flex justify-content-between mt-2">
    <h3>Solicitação #{{$solicitacao->id}}</h3>
    <div class="d-flex align-items-center">
        <span class="badge rounded-pill bg-secondary p-2">{{$solicitacao->status}}</span>
    </div>
</div>
<h3>Dados do paciente</h3>

<form>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="nome_paciente">Nome do paciente</label>
            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="José Silva" value="{{$solicitacao->nome_paciente}}" disabled>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="sobrenome_paciente">Sobrenome do paciente</label>
            <input type="text" class="form-control" id="sobrenome_paciente" name="sobrenome_paciente" placeholder="José Silva" value="{{$solicitacao->sobrenome_paciente}}" disabled>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_fixo">Telefone fixo</label>
            <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="José Silva" value="{{"(".substr($solicitacao->telefone_fixo,0,2).") ".substr($solicitacao->telefone_fixo,2,-4)."-".substr($solicitacao->telefone_fixo,-4)}}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_celular">Telefone celular</label>
            <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" placeholder="José Silva" value="{{"(".substr($solicitacao->telefone_celular,0,2).") ".substr($solicitacao->telefone_celular,2,-4)."-".substr($solicitacao->telefone_celular,-4)}}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="José Silva" value="{{$solicitacao->endereco}}" disabled>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="rg_paciente">RG do paciente</label>
            <input type="text" class="form-control" id="rg_paciente" name="rg_paciente" placeholder="José Silva" value="{{$solicitacao->rg_paciente}}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cpf_paciente">CPF do paciente</label>
            <input type="text" class="form-control" id="cpf_paciente" name="cpf_paciente" placeholder="José Silva" value="{{$solicitacao->cpf_paciente}}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUS">Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUS" name="cartaoSUS" placeholder="0234592" value="{{$solicitacao->cartaoSUS}}" disabled>
        </div>
        <div class="col-12 mb-2">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Observação ou comentário sobre o procedimento" disabled>{{$solicitacao->cartaoSUS}}</textarea>
        </div>
    </div>
</form>
<div class="d-flex justify-content-end mb-2 mt-2">
    <a href="/dashboard" class="btn btn-outline-primary"><i class="fas fa-list"></i> Todos os procedimentos</a>
    <a href="/solicitacao/edit/{{$solicitacao->id}}" class="btn btn-outline-warning"><i class="fas fa-edit"></i> Alterar dados</a>
    <a href="/solicitacao/delete/{{$solicitacao->id}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Excluir registro</a>
</div>
<h3>Dados do procedimento</h3>

<form>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="procedimento">Procedimento</label>
            <select class="form-control" id="procedimento" name="procedimento" disabled>
                <option value="Catarata" {{$solicitacao->procedimento == 'Catarata' ? 'selected' : ''}}>Catarata</option>
                <option value="Pterígio" {{$solicitacao->procedimento == 'Pterígio' ? 'selected' : ''}}>Pterígio</option>
                <option value="Glaucoma" {{$solicitacao->procedimento == 'Glaucoma' ? 'selected' : ''}}>Glaucoma</option>
                <option value="Retina" {{$solicitacao->procedimento == 'Retina' ? 'selected' : ''}}>Retina</option>
                <option value="Outros" {{$solicitacao->procedimento == 'Outros' ? 'selected' : ''}}>Outros</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="urgencia">Prioridade</label>
            <select class="form-control" id="urgencia" name="urgencia" disabled>
                <option value="1" {{$solicitacao->urgencia ? 'selected' : ''}}>Urgência</option>
                <option value="0" {{!$solicitacao->urgencia ? 'selected' : ''}}>Procedimento normal</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUSNovo">Novo Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUSNovo" name="cartaoSUSNovo" placeholder="Cartão do SUS de Salvador" value="{{$solicitacao->cartaoSUSNovo}}" disabled>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="data-procedimento">Data do procedimento</label>
            <input type="text" class="form-control" id="data-procedimento" name="data-procedimento" placeholder="Data do procedimento" value="{{$solicitacao->data_procediemnto}}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="local_procedimento">Local do procedimento</label>
            <input type="text" class="form-control" id="local_procedimento" name="local_procedimento" placeholder="0234592" value="{{$solicitacao->local_procedimento}}" disabled>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="senha_procedimento">Senha do procedimento</label>
            <input type="text" class="form-control" id="senha_procedimento" name="senha_procedimento" placeholder="0234592" value="{{$solicitacao->senha_procedimento}}" disabled>
        </div>

    </div>
</form>

<h5>Documentos</h5>
@endsection
