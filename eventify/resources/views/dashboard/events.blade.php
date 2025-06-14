@extends('layouts.app')

<title>Dashboard | Eventos</title>

@section('content')

@include('components.dashboard.nav')

<section class="container mb-5">
    <div class="row mt-4">
        <div class="col-12">
            <h1 class="fw-bold">
                Mis eventos
            </h1>
            <hr class="mt-0">
            
            <ul class="navbar-nav flex-row mb-4">
                <li class="nav-item me-2 btn btn-primary fw-bold ">
                    <a class="nav-link text-white" href="#mis-eventos">
                        <i class="bi bi-plus-square-fill me-2"></i></i>
                        Crear evento
                    </a>
                </li>
            </ul>

            <div class="row">
                @foreach (range(1,3) as $card)
                    @include('components.dashboard.event-card', ['url' => '#', 'title' => 'Concierto X', 'badges' => ['Concierto', 'Cine', 'Teatro'], 'image' => 'https://storage.googleapis.com/events-images-upload/2024/4/16/428141149/pic_cover_1713296806.2512121.png', 'location' => 'Estados Unidos', 'date' => '24 de Abril', 'description' => 'The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the elements whilst still looking cool.', 'price' => '$125.000', 'available' => true])
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection