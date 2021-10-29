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
            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="José Silva" value="{{$solicitacao->nome_paciente}}" minlength="3" maxlength="50" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="sobrenome_paciente">Sobrenome do paciente</label>
            <input type="text" class="form-control" id="sobrenome_paciente" name="sobrenome_paciente" placeholder="Antônio de Almeida" minlength="3" maxlength="50" value="{{$solicitacao->sobrenome_paciente}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_fixo">Telefone fixo</label>
            <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="(71) 3592-9231" minlength="8" maxlength="10" value="{{$solicitacao->telefone_fixo}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_celular">Telefone celular</label>
            <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" placeholder="(71) 9 9352-2736" minlength="8" maxlength="11" value="{{$solicitacao->telefone_celular}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua Machado de Assis nº 103" minlength="3" maxlength="100" value="{{$solicitacao->endereco}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="rg_paciente">RG do paciente</label>
            <input type="text" class="form-control" id="rg_paciente" name="rg_paciente" placeholder="39.194.041-7" minlength="3" maxlength="20" value="{{$solicitacao->rg_paciente}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cpf_paciente">CPF do paciente</label>
            <input type="text" class="form-control" id="cpf_paciente" name="cpf_paciente" placeholder="643.266.444-60" minlength="11" maxlength="11" value="{{$solicitacao->cpf_paciente}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUS">Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUS" name="cartaoSUS" placeholder="64014300" minlength="3" maxlength="20" value="{{$solicitacao->cartaoSUS}}" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-12 mb-2">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Observação ou comentário sobre o procedimento" minlength="3" maxlength="255" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>{{$solicitacao->cartaoSUS}}</textarea>
        </div>
    </div>

    <h3>Dados do procedimento</h3>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="procedimento">Procedimento</label>
            <select class="form-control" id="procedimento" name="procedimento" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
                <option value="Catarata" {{$solicitacao->procedimento == 'Catarata' ? 'selected' : ''}}>Catarata</option>
                <option value="Pterígio" {{$solicitacao->procedimento == 'Pterígio' ? 'selected' : ''}}>Pterígio</option>
                <option value="Glaucoma" {{$solicitacao->procedimento == 'Glaucoma' ? 'selected' : ''}}>Glaucoma</option>
                <option value="Retina" {{$solicitacao->procedimento == 'Retina' ? 'selected' : ''}}>Retina</option>
                <option value="Outros" {{$solicitacao->procedimento == 'Outros' ? 'selected' : ''}}>Outros</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="urgencia">Prioridade</label>
            <select class="form-control" id="urgencia" name="urgencia" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
                <option value="1" {{$solicitacao->urgencia ? 'selected' : ''}}>Urgência</option>
                <option value="0" {{!$solicitacao->urgencia ? 'selected' : ''}}>Procedimento normal</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUSNovo">Novo Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUSNovo" name="cartaoSUSNovo" placeholder="Cartão do SUS de Salvador" minlength="3" maxlength="20" value="{{$solicitacao->cartaoSUSNovo}}" {{((Auth::user()->user_type == 'Setor de documentos') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
        <label for="data_procedimento">Data do procedimento</label>
            <input type="text" class="form-control" id="data_procedimento" name="data_procedimento" placeholder="Data do procedimento" value="{{$solicitacao->data_procediemnto}}" {{((Auth::user()->user_type == 'Setor de documentos') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="local_procedimento">Local do procedimento</label>
            <input type="text" class="form-control" id="local_procedimento" name="local_procedimento" placeholder="Centro Cirúrgico Carlos Chargas" minlength="3" maxlength="255" value="{{$solicitacao->local_procedimento}}" {{((Auth::user()->user_type == 'Setor de documentos') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="senha_procedimento">Senha do procedimento</label>
            <input type="text" class="form-control" id="senha_procedimento" name="senha_procedimento" placeholder="0234592" minlength="3" maxlength="255" value="{{$solicitacao->senha_procedimento}}" {{((Auth::user()->user_type == 'Setor de documentos') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>

        <h5>Documentos</h5>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <div class="form-group">
                <label>Documentos</label>
                <label for="documents" class="btn btn-outline-secondary w-100"> <i class="fas fa-file-medical"></i> Anexar documentos</label>
                <input type="file" name="documents[]" id="documents" accept="" style="display: none" multiple>
            </div>
        </div>
        @if(Auth::user()->user_type == 'Administração')
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="procedimento">Status da solicitação</label>
            <select class="form-control" id="procedimento" name="procedimento" required>
                <option value="Solicitação cadastrada" {{$solicitacao->status == 'Solicitação cadastrada' ? 'selected' : ''}}>Solicitação cadastrada</option>
                <option value="Trocar cartão SUS" {{$solicitacao->status == 'Trocar cartão SUS' ? 'selected' : ''}}>Trocar cartão SUS</option>
                <option value="Liberar para agendamento" {{$solicitacao->status == 'Liberar para agendamento' ? 'selected' : ''}}>Liberar para agendamento</option>
                <option value="Agendar procedimento" {{$solicitacao->status == 'Agendar procedimento' ? 'selected' : ''}}>Agendar procedimento</option>
                <option value="Procedimento agendado" {{$solicitacao->status == 'Procedimento agendado' ? 'selected' : ''}}>Procedimento agendado</option>
            </select>
        </div>
        @endif
    </div>


    <div class="d-flex justify-content-end mb-2 mt-2">
        <a href="/dashboard" class="btn btn-outline-secondary"><i class="fas fa-list ms-2"></i> Todos os procedimentos</a>
        <a href="/solicitacao/{{$solicitacao->id}}" class="btn btn-outline-warning ms-2"><i class="fas fa-file-medical"></i> Voltar para registro</a>
        <button type="submit" class="btn btn-outline-success ms-2"><i class="fas fa-save"></i> Salvar dados</button>
    </div>
</form>

@endsection
