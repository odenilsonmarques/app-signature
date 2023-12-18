@extends('layouts.template')
@section('title', 'home')

@section('content')

    <section class="container hero-section">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 hero-text">
                <!-- Conteúdo de texto aqui -->
                <h1>Transforme suas ideias em futuro</h1>
                <p>
                    Construa o amanhã com suas ideias. Explore possibilidades, seja protagonista na criação. Junte-se a nós
                    para materializar visões e deixar uma marca única no mundo.
                </p>

                <button class="btn btn-primary">Começe agora mesmo
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img src="{{ 'assets/img/igm1hero.svg' }}" alt="Sua Imagem" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="container plans-section">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center mb-4">
                <h1>Plano que melhor se adapta a você</h1>
                <p>Escolha o plano que melhor se encaixa às suas necessidades</p>
            </div>
    
            @foreach ($plans as $plan)
                <div class="col-md-4 mb-4">
                    <div class="card bg-light">
                        <div class="card-header">{{ $plan->name }}
                            @if ($plan->recomended)
                                <span class="badge badge-primary">Recomendado</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center"><span class="display-cifrao">R$</span>{{ number_format($plan->price, 2, ',', '.') }}</span></h5>
                            <ul class="list-checked list-checked-primary">
                                @foreach ($plan->features as $feature)
                                    <li>{{ $feature->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('assina.plan', $plan->url) }}" class="btn btn-primary">Assinar agora
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    


    <section class="container-fluid form-section">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <form action="" method="">
                        @csrf
                        <h2 class="text-center mb-4">Fale conosco</h2>
                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="subject">Assunto</label>
                            <input type="subject" class="form-control" id="subject" name="subject" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="message">Mensagem</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endSection
