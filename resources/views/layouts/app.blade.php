<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Gestão Escolar</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Responsiva -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Gestão Escolar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if(auth()->user()->tipo == 'professor')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('estudantes.index') }}">Estudantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('professores.index') }}">Professores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('turmas.index') }}">Turmas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
                    </li>
                    @elseif(auth()->user()->tipo == 'estudante')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('turmas.index') }}">Turmas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('matriculas.index') }}">Matrículas</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sair
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
                @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Mensagens de Feedback -->
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>