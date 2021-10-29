@extends('layout/_layout')
@section('title') Home @endsection


@section('content')
    <div class="d-flex justify-content-between">
        <h1>Usuarios</h1>
        <div class="d-flex align-items-center">
            <div class="d-flex justify-content-end mb-2">
                <a href="/admin/users/create" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#create-user"> <i class="fas fa-user-plus"></i> Cadastrar usuário</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do usuário</th>
                <th scope="col">Email do usuário</th>
                <th scope="col">Tipo do usuário</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $u)
            <tr>
                <th scope="row">{{ $u->id }}</th>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->user_type }}</td>
                <td>
                    <a class="btn btn-outline-warning btn-sm" href="/usuarios/edit/{{$u->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a class="btn btn-outline-danger btn-sm" href="/usuarios/delete/{{$u->id}}">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-center text-primary">
        {!! $usuarios->links() !!}
    </div>

    <div class="modal fade" id="create-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/usuarios" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="name">Nome do Usuário</label>
                        <input type="text" class="form-control mb-4" id="name" name="name" placeholder="José Silva (Central Documentos)" minlength="3" maxlength="255" required>

                        <label for="email">Email do Usuário</label>
                        <input type="email" class="form-control mb-4" id="email" name="email" placeholder="jose.silva_cetdoc@imv.ogr.br" minlength="3" maxlength="255" required>

                        <label for="password">Senha do Usuário</label>
                        <input type="password" class="form-control mb-4" id="password" name="password" placeholder="••••••••" minlength="3" maxlength="255" required>

                        <label for="user_type">Tipo de usuário</label>
                        <select class="form-control mb-4" id="user_type" name="user_type" required>
                            <option value="Secretaria Municipal">Secretaria Municipal</option>
                            <option value="Setor de documentos">Setor de documentos</option>
                            <option value="Central de agendamento">Central de agendamento</option>
                            <option value="Administração">Administração</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <i class="fas fa-times "></i> Cancelar</button>
                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Criar usuário</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
