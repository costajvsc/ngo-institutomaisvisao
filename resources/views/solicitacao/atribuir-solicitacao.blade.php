@extends('layout/_layout')
@section('title') Atribuir solicitação @endsection


@section('content')
    @if(!empty($solicitacoes))
    <h1>Atribuir solicitação</h1>
    <form action="/solicitacao/liberar/update" method="POST">
        @csrf
        <input type="hidden" name="user_type" value="{{$user_type}}">
        <table class="table">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="form-group">
                        <label for="responsavel">Responsável</label>
                        <select class="form-control" id="responsavel" name="responsavel">
                        @foreach ($usuarios as $u)
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Liberar solicitação</button>
                </div>
            </div>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do paciente</th>
                    <th scope="col">Procedimento</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Etapa</th>
                    <th scope="col">Liberar solicitação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitacoes as $s)
                <tr>
                    <th scope="row">{{ $s->id }}</th>
                    <td>{{ $s->nome_paciente }}</td>
                    <td>{{ $s->procedimento }}</td>
                    <td>{{ $s->urgencia == 0 ? 'Procedimento normal' : 'Urgencia' }}</td>
                    <td>{{ $s->status }}</td>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="solicitacoes[]" value="{{$s->id}}" checked>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </form>
    @else
    <div class="alert alert-warning">
        Nenhuma solicitação a ser liberada no momento
    </div>
    @endif

@endsection
