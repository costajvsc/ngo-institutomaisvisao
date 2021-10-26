@extends('layout/_layout')
@section('title') Home @endsection


@section('content')
    <h3>Usuários #{{$usuario->id}}</h3>
    <form action="/usuarios/update" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$usuario->id}}">
        <label for="name">Nome do Usuário</label>
        <input type="text" class="form-control mb-4" id="name" name="name" value="{{$usuario->name}}"  required>

        <label for="email">Email do Usuário</label>
        <input type="email" class="form-control mb-4" id="email" name="email" value="{{$usuario->email}}"" required>

        <label for="password">Senha do Usuário</label>
        <input type="password" class="form-control mb-4" id="password" name="password" required>

        <label for="user_type">Tipo de usuário</label>
        <select class="form-control mb-4" id="user_type" name="user_type" required>
            <option value="Secretaria Municipal" {{$usuario->user_type == 'Secretaria Municipal' ? 'selected' : ''}}>Secretaria Municipal</option>
            <option value="Setor de documentos" {{$usuario->user_type == 'Setor de documentos' ? 'selected' : ''}}>Setor de documentos</option>
            <option value="Central de agendamento" {{$usuario->user_type == 'Central de agendamento' ? 'selected' : ''}}>Central de agendamento</option>
            <option value="Administração" {{$usuario->user_type == 'Administração' ? 'selected' : ''}}>Administração</option>
        </select>

        <div class="d-flex justify-content-end">
            <a href="/usuarios" class="btn btn-outline-secondary ms-2"><i class="fas fa-list"></i> Todos os usuários</a>
            <button type="submit" class="btn btn-outline-success ms-2"> <i class="fas fa-user-edit"></i>Alterar usuário</button>
        </div>
    </form>
@endsection
