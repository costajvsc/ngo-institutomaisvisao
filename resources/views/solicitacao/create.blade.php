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
            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" placeholder="José Silva" required>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-2">
            <label for="sobrenome_paciente">Sobrenome do paciente</label>
            <input type="text" class="form-control" id="sobrenome_paciente" name="sobrenome_paciente" placeholder="Antônio de Almeida" required>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_fixo">Telefone fixo</label>
            <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="(71) 3592-9231">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="telefone_celular">Telefone celular</label>
            <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" placeholder="(71) 9 9352-2736">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua Machado de Assis nº 103">
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="rg_paciente">RG do paciente</label>
            <input type="text" class="form-control" id="rg_paciente" name="rg_paciente" placeholder="39.194.041-7">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cpf_paciente">CPF do paciente</label>
            <input type="text" class="form-control" id="cpf_paciente" name="cpf_paciente" placeholder="643.266.444-60">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUS">Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUS" name="cartaoSUS" placeholder="64014300">
        </div>
        <div class="col-12 mb-2">
            <label for="observacao">Observação</label>
            <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Observação ou comentário sobre o procedimento"></textarea>
        </div>
    </div>

    <h3>Dados do procedimento</h3>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="procedimento">Procedimento</label>
            <select class="form-control" id="procedimento" name="procedimento" required>
                <option value="Catarata">Catarata</option>
                <option value="Pterígio">Pterígio</option>
                <option value="Glaucoma">Glaucoma</option>
                <option value="Retina">Retina</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="urgencia">Prioridade do procedimento</label>
            <select class="form-control" id="urgencia" name="urgencia" required>
                <option value="0" selected>Procedimento normal</option>
                <option value="1">Urgência</option>
            </select>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="cartaoSUSNovo">Novo Cartão do SUS</label>
            <input type="text" class="form-control" id="cartaoSUSNovo" name="cartaoSUSNovo" placeholder="Cartão do SUS de Salvador">
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
        <label for="data_procedimento">Data do procedimento</label>
            <input type="datetime" class="form-control" id="data_procedimento" name="data_procedimento" placeholder="Data do procedimento">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="local_procedimento">Local do procedimento</label>
            <input type="text" class="form-control" id="local_procedimento" name="local_procedimento" placeholder="Centro Cirúrgico Carlos Chargas">
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-2">
            <label for="senha_procedimento">Senha do procedimento</label>
            <input type="text" class="form-control" id="senha_procedimento" name="senha_procedimento" placeholder="0234592">
        </div>
    </div>

    <h5>Documentos</h5>
    <div class="form-group">
        <label for="documents">Fotos do produto</label>
        <input type="file" name="documents[]" id="documents" accept="" multiple>
    </div>

    <div class="d-flex justify-content-end mb-2 mt-2">
        <a href="/dashboard" class="btn btn-outline-secondary ms-2"><i class="fas fa-list"></i> Todos os procedimentos</a>
        <button type="submit" class="btn btn-outline-success ms-2"><i class="fas fa-save"></i> Criar solicitação</button>
    </div>
</form>


@endsection
