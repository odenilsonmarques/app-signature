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
                    <svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Imagem aqui -->
                <img src="{{ 'assets/img/igm1hero.svg' }}" alt="Sua Imagem" class="img-fluid">

                {{-- <img src="{{ 'assets/img/estoque4.svg' }}" alt="" width="250" height="250px"> --}}
            </div>
        </div>
    </section>

    <section class="container plans-section">
        <div class="row">
            <h1>Inserir aqui o texto</h1>
            <div class="col-lg-6 col-md-6 col-sm-12 hero-text">
                <!-- Conteúdo de texto aqui -->
                <h1></h1>
                <p>
                    Construa o amanhã com suas ideias. Explore possibilidades, seja protagonista na criação. Junte-se a nós
                    para materializar visões e deixar uma marca única no mundo.
                </p>

                
            </div>
        </div>
    </section>



@endSection
