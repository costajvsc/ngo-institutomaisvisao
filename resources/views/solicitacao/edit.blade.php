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

<form action="/solicitacao/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$solicitacao->id}}">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="nome_paciente">Nome do paciente</label>
            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="José Silva" value="{{$solicitacao->nome_paciente}}" required>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="sobrenome_paciente">Sobrenome do paciente</label>
            <input type="text" class="form-control" id="sobrenome_paciente" name="sobrenome_paciente" placeholder="José Silva" value="{{$solicitacao->sobrenome_paciente}}" required>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_fixo">Telefone fixo</label>
            <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="José Silva" value="{{"(".substr($solicitacao->telefone_fixo,0,2).") ".substr($solicitacao->telefone_fixo,2,-4)."-".substr($solicitacao->telefone_fixo,-4)}}" required>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_celular">Telefone celular</label>
            <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" placeholder="José Silva" value="{{"(".substr($solicitacao->telefone_celular,0,2).") ".substr($solicitacao->telefone_celular,2,-4)."-".substr($solicitacao->telefone_celular,-4)}}" required>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="José Silva" value="{{$solicitacao->endereco}}" required>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="rg_paciente">RG do paciente</label>
            <input type="text" class="form-control" id="rg_paciente" name="rg_paciente" placeholder="José Silva" value="{{$solicitacao->rg_paciente}}" required>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cpf_paciente">CPF do paciente</label>
            <input type="text" class="form-control" id="cpf_paciente" name="cpf_paciente" placeholder="José Silva" value="{{$solicitacao->cpf_paciente}}" required>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUS">Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUS" name="cartaoSUS" placeholder="0234592" value="{{$solicitacao->cartaoSUS}}" required>
        </div>
        <div class="col-12 mb-2">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Observação ou comentário sobre o procedimento" required>{{$solicitacao->cartaoSUS}}</textarea>
        </div>
    </div>

    <h3>Dados do procedimento</h3>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="procedimento">Procedimento</label>
            <select class="form-control" id="procedimento" name="procedimento" required>
                <option value="Catarata" {{$solicitacao->procedimento == 'Catarata' ? 'selected' : ''}}>Catarata</option>
                <option value="Pterígio" {{$solicitacao->procedimento == 'Pterígio' ? 'selected' : ''}}>Pterígio</option>
                <option value="Glaucoma" {{$solicitacao->procedimento == 'Glaucoma' ? 'selected' : ''}}>Glaucoma</option>
                <option value="Retina" {{$solicitacao->procedimento == 'Retina' ? 'selected' : ''}}>Retina</option>
                <option value="Outros" {{$solicitacao->procedimento == 'Outros' ? 'selected' : ''}}>Outros</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="urgencia">Prioridade</label>
            <select class="form-control" id="urgencia" name="urgencia" required>
                <option value="1" {{$solicitacao->urgencia ? 'selected' : ''}}>Urgência</option>
                <option value="0" {{!$solicitacao->urgencia ? 'selected' : ''}}>Procedimento normal</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUSNovo">Novo Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUSNovo" name="cartaoSUSNovo" placeholder="Cartão do SUS de Salvador" value="{{$solicitacao->cartaoSUSNovo}}" required>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
        <label for="data_procedimento">Data do procedimento</label>
            <input type="text" class="form-control" id="data_procedimento" name="data_procedimento" placeholder="Data do procedimento" value="{{$solicitacao->data_procediemnto}}" required>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="local_procedimento">Local do procedimento</label>
            <input type="text" class="form-control" id="local_procedimento" name="local_procedimento" placeholder="0234592" value="{{$solicitacao->local_procedimento}}" required>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="senha_procedimento">Senha do procedimento</label>
            <input type="text" class="form-control" id="senha_procedimento" name="senha_procedimento" placeholder="0234592" value="{{$solicitacao->senha_procedimento}}" required>
        </div>
    </div>

    <h5>Documentos</h5>
    <div class="form-group">
        <label for="documents">Fotos do produto</label>
        <input type="file" name="documents[]" id="documents" accept="" multiple>
    </div>

    <div class="d-flex justify-content-end mb-2 mt-2">
        <a href="/dashboard" class="btn btn-outline-secondary"><i class="fas fa-list ms-2"></i> Todos os procedimentos</a>
        <a href="/solicitacao/{{$solicitacao->id}}" class="btn btn-outline-warning ms-2"><i class="fas fa-file-medical"></i> Voltar para registro</a>
        <button type="submit" class="btn btn-outline-success ms-2"><i class="fas fa-save"></i> Salvar dados</button>
    </div>
</form>

@endsection
