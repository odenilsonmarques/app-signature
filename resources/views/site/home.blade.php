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
            <h1>Plano que melhor se adapta a você</h1>
            <p>Escolha o plano que melhor se encaixa as suas necessidades</p>
            @foreach ($plans as $plan)
                <div class="col-4">
                    <div class="card bg-light mb-3" style="max-width: 30rem;">
                        <div class="card-header">{{ $plan->name }}
                            @if ($plan->recomended)
                                <span class="badge">Recomendado</span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center"><span class="display-cifrao">R$</span>{{number_format($plan->price, 2, ',', '.')}}</span></h5>
                            <ul class=" list-checked list-checked-primary">
                                @foreach ($plan->features as $feature)
                                <li>{{$feature->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('assina.plan',$plan->url)}}"><button class="btn btn-primary">Assinar agora mesmo
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endSection
