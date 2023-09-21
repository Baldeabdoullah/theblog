@extends('layouts.app')

@section('content')
    <section class="about container" id="about">
        <div class="contentBx">
            <h2 class="titleText">Qui sommes nous ?</h2>
            <p class="title-text">
                Digitalist est un blog d'actualité numérique. Nous redigeons des articles
                sur des sujets divers liés à la technologie.
                Nous possedons également une chaine youtube et un podcast.
            </p>
            <a href="#" class="btn2">Voir plus</a>
        </div>
        <div class="imgBx">
            <img src="{{ asset('/images/') }}/about2.jpg" alt="" class="fitBg">
        </div>
    </section>

    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter="all">All</span>
        @foreach ($categories as $categorie)
            <span class="filter-item" data-filter="{{ $categorie->name }}">{{ $categorie->name }}</span>
        @endforeach
    </div>

    <div class="post container">
        <!-- Post 1 -->
        @foreach ($posts as $post)
            <div class="post-box {{ $post->categorie->name }}">

                <img src="{{ asset('/storage/' . $post->image) }}" alt="" class="post-img">
                <h2 class="category">{{ $post->categorie->name }}</h2>
                <a href="{{ route('posts.show', $post->id) }}" class="post-title">{{ $post->title }}</a>
                <span class="post-date">12 Feb 2022</span>
                <p class="post-description">{{ $post->content }}.</p>

            </div>
        @endforeach

    </div>
@endsection
