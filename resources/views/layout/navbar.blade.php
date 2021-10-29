@auth
<div class="container mt-4 text-end">
    <h6>Bem vindo, {{Auth::user()->name}} | #{{Auth::user()->id}}</h6>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div>
            <a class="navbar-brand" href="/dashboard">
              <img src="/img/ico.png" alt="" width="30" height="24">
            </a>
        </div>

        <form class="d-flex" action="/search" method="POST">
            @csrf
            <input class="form-control me-2" type="text" name="params" placeholder="Nome do paciente ou ID" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <div class="d-flex justify-content-between">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    @if(Auth::user()->user_type == "Secretaria Municipal")
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/solicitacao"><i class="fas fa-file-medical"></i> Cadastrar solicitação</a>
                    </li>
                    @endif
                    @if(Auth::user()->user_type == "Administração")
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSolicitacao" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Solicitação
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownSolicitacao">
                            <li><a class="dropdown-item" href="/solicitacao">Cadastrar solicitação</a></li>
                            <li><a class="dropdown-item" href="/solicitacao/liberar/cadastrada">Solicitações cadastradas</a></li>
                            <li><a class="dropdown-item" href="/solicitacao/liberar/agendamento">Liberar para agendamento</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usuarios">Usuários</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="/logout"><i class="fas fa-sign-out-alt"></i> Logut</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
@endauth
