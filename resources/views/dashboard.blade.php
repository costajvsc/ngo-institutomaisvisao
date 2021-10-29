@extends('layout/_layout')
@section('title') Home @endsection


@section('content')
        @if(!empty($urgencias))
            <h1>Urgencias</h1>
            <div class="row mt-2 mb-2">
                @foreach($urgencias as $u)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center border-danger h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span class="badge rounded-pill bg-danger">{{$u->status}}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="fw-light">{{date_format(new DateTime($u->created_at), 'd/m/Y')}}</span> <br>
                                            <span class="fw-light">{{$u->procedimento}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{$u->nome_paciente}}</h5>
                                        <p class="card-text fw-light">{{$u->sobrenome_paciente}}</p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <a href="tel:{{$u->telefone_fixo}}" class="fw-light">{{$u->telefone_fixo == '' ? ("(".substr($u->telefone_fixo,0,2).") ".substr($u->telefone_fixo,2,-4)."-".substr($u->telefone_fixo,-4)) : ''}}</a>
                                        <a href="tel:{{$u->telefone_fixo}}" class="fw-light">{{$u->telefone_celular == '' ? ("(".substr($u->telefone_celular,0,2).") ".substr($u->telefone_celular,2,-4)."-".substr($u->telefone_celular,-4)) : ''}}</a>
                                    </div>
                                </div>
                                <p class="card-text mb-4">{{$u->observacao}}</p>

                                <a href="/solicitacao/{{$u->id}}" class="btn btn-outline-danger"> <i class="fas fa-file-medical"></i> Acessar solicitação </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if(!empty($solicitacoes))
            <h1>Solicitações</h1>
            <div class="row mt-2 mb-2">
                @foreach($solicitacoes as $s)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center border-secondary h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span class="badge rounded-pill bg-secondary">{{$s->status}}</span>
                                        </div>
                                        <div class="text-end">
                                            <span class="fw-light">{{date_format(new DateTime($s->created_at), 'd/m/Y')}}</span> <br>
                                            <span class="fw-light">{{$s->procedimento}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">{{$s->nome_paciente}}</h5>
                                        <p class="card-text fw-light">{{$s->sobrenome_paciente}}</p>
                                    </div>

                                    <div class="d-flex justify-content-between mb-4">
                                        <a href="tel:{{$s->telefone_fixo}}" class="fw-light">{{$s->telefone_fixo == '' ? ("(".substr($s->telefone_fixo,0,2).") ".substr($s->telefone_fixo,2,-4)."-".substr($s->telefone_fixo,-4)) : ''}}</a>
                                        <a href="tel:{{$s->telefone_fixo}}" class="fw-light">{{$s->telefone_celular == '' ? ("(".substr($s->telefone_celular,0,2).") ".substr($s->telefone_celular,2,-4)."-".substr($s->telefone_celular,-4)) : ''}}</a>
                                    </div>
                                </div>
                                <p class="card-text mb-4">{{$s->observacao}}</p>

                                <a href="/solicitacao/{{$s->id}}" class="btn btn-outline-secondary"> <i class="fas fa-file-medical"></i> Acessar solicitação </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center text-primary">
                {!! $solicitacoes->links() !!}
            </div>
        @else
        <div class="alert alert-warning">
            Nenhuma solicitação cadastrada no momento
        </div>
        @endif
    </div>
@endsection
