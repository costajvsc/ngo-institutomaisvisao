@extends('../layout/_layout')
@section('title') Solicitação @endsection


@section('content')
<div class="d-flex justify-content-between mt-2">
    <h3>Criar nova solicitação</h3>
</div>
<h3>Dados do paciente</h3>
<form action="/solicitacao" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="nome_paciente">Nome do paciente</label>
            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="José Silva" minlength="3" maxlength="50" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="sobrenome_paciente">Sobrenome do paciente</label>
            <input type="text" class="form-control" id="sobrenome_paciente" name="sobrenome_paciente" placeholder="Antônio de Almeida" minlength="3" maxlength="50" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_fixo">Telefone fixo</label>
            <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="(71) 3592-9231" minlength="8" maxlength="10" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_celular">Telefone celular</label>
            <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" placeholder="(71) 9 9352-2736" minlength="8" maxlength="11" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua Machado de Assis nº 103" minlength="3" maxlength="100" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="rg_paciente">RG do paciente</label>
            <input type="text" class="form-control" id="rg_paciente" name="rg_paciente" placeholder="39.194.041-7" minlength="3" maxlength="20" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cpf_paciente">CPF do paciente</label>
            <input type="text" class="form-control" id="cpf_paciente" name="cpf_paciente" placeholder="643.266.444-60" minlength="11" maxlength="11"  {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUS">Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUS" name="cartaoSUS" placeholder="64014300" minlength="3" maxlength="20" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}>
        </div>
        <div class="col-12 mb-2">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" minlength="3" maxlength="255" placeholder="Observação ou comentário sobre o procedimento" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? '' : 'disabled' }}></textarea>
        </div>
    </div>

    <h3>Dados do procedimento</h3>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="procedimento">Procedimento</label>
            <select class="form-control" id="procedimento" name="procedimento" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
                <option value="Catarata">Catarata</option>
                <option value="Pterígio">Pterígio</option>
                <option value="Glaucoma">Glaucoma</option>
                <option value="Retina">Retina</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="urgencia">Prioridade do procedimento</label>
            <select class="form-control" id="urgencia" name="urgencia" {{((Auth::user()->user_type == 'Secretaria Municipal') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
                <option value="0" selected>Procedimento normal</option>
                <option value="1">Urgência</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUSNovo">Novo Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUSNovo" name="cartaoSUSNovo" placeholder="Cartão do SUS de Salvador" minlength="3" maxlength="20" {{((Auth::user()->user_type == 'Setor de documentos') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
        <label for="data_procedimento">Data do procedimento</label>
            <input type="datetime-local" class="form-control" id="data_procedimento" name="data_procedimento" placeholder="Data do procedimento"  {{((Auth::user()->user_type == 'Central de agendamento') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="local_procedimento">Local do procedimento</label>
            <input type="text" class="form-control" id="local_procedimento" name="local_procedimento" placeholder="Centro Cirúrgico Carlos Chargas" minlength="3" maxlength="255" {{((Auth::user()->user_type == 'Central de agendamento') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="senha_procedimento">Senha do procedimento</label>
            <input type="text" class="form-control" id="senha_procedimento" name="senha_procedimento" placeholder="0234592" minlength="3" maxlength="255" {{((Auth::user()->user_type == 'Central de agendamento') || (Auth::user()->user_type == 'Administração')) ? 'required' : 'disabled' }}>
        </div>

        <h5>Documentos</h5>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <div class="form-group">
                <label>Documentos</label>
                <label for="documents" class="btn btn-outline-secondary w-100"> <i class="fas fa-file-medical"></i> Anexar documentos</label>
                <input type="file" name="documents[]" id="documents" accept="" style="display: none" multiple>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mb-2 mt-2">
        <a href="/dashboard" class="btn btn-outline-secondary ms-2"><i class="fas fa-list"></i> Todos os procedimentos</a>
        <button type="submit" class="btn btn-outline-success ms-2"><i class="fas fa-save"></i> Criar solicitação</button>
    </div>
</form>


@endsection
