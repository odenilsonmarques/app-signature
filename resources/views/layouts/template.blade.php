<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <header class="mb back-header">
        <nav class="navbar navbar-expand-sm navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ 'assets/img/artificial-intelligence.png' }}" alt="logo" width="60" height="55">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#">O Que é</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#">Funcionalidade</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#pricing">Preço</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#contact">Converse com a gente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-sm-12 text-center">
                    {{-- <span>2ps.com <br> problemas precisam de solução</span> --}}
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sendForm.js') }}"></script>
</body>

</html>
