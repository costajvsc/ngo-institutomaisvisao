@extends('../layout/_layout')
@section('title') Documentação @endsection


@section('content')
<div class="d-flex justify-content-between mt-2">
    <h3> Excluir usuario #{{$usuario->id}}</h3>
</div>
<h5>Tem certeza que deseja excluir esse usuario? Todos os dados <span class="text-danger">serão perdidos</span>.</h5>
<p><span class="fw-bold">Nome do usuario</span> {{$usuario->name}}</p>
<p><span class="fw-bold">Email do usuario</span> {{$usuario->email}}</p>
<p><span class="fw-bold">Tipo do usuario</span> {{$usuario->user_type}}</p>
<p><span class="fw-bold">Senha do paciente</span></p>

<form action="/usuarios/delete" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{$usuario->id}}">
    <div class="d-flex justify-content-end">
        <a href="/usuarios" class="btn btn-outline-secondary ms-2"><i class="fas fa-list"></i> Todos os usuarios</a>
        <button type="submit" class="btn btn-outline-danger ms-2"><i class="fas fa-trash-alt"></i> Excluir usuario</button>
    </div>
</form>

@endsection
