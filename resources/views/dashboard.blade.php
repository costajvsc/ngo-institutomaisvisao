@extends('layout/_layout')
@section('title') Home @endsection


@section('content')
        <h1>Solicitações</h1>
        <div class="row mt-2 mb-2">
            @foreach($solicitacao as $s)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card text-center border-secondary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="badge rounded-pill bg-secondary">{{$s->status}}</span>
                                <span class="fw-light">{{date_format(new DateTime($s->created_at), 'd/m/Y')}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{$s->nome_paciente}}</h5>
                                <p class="card-text fw-light">{{$s->sobrenome_paciente}}</p>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <a href="tel:{{$s->telefone_fixo}}" class="fw-light">{{"(".substr($s->telefone_fixo,0,2).") ".substr($s->telefone_fixo,2,-4)."-".substr($s->telefone_fixo,-4)}}</a>
                                <a href="tel:{{$s->telefone_fixo}}" class="fw-light">{{"(".substr($s->telefone_celular,0,2).") ".substr($s->telefone_celular,2,-4)."-".substr($s->telefone_celular,-4)}}</a>
                            </div>
                            <p class="card-text mb-4">{{$s->observacao}}</p>
                            <a href="#" class="btn btn-outline-secondary"> <i class="fas fa-file-medical"></i> Acessar solicitação </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center text-primary">
            {!! $solicitacao->links() !!}
        </div>
    </div>
@endsection
