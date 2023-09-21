@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Post 1 -->
        <div class="detail-post tech">
            <img src="{{ asset('/storage/' . $post->image) }}" alt="" class="detail-post-img">
            <h2 class="category">{{ $post->categorie->name }}</h2>
            <h1 class="post-title">{{ $post->title }}</h1>
            <span class="post-date">12 Feb 2022</span>
            <p class="post-description">{{ $post->content }}</p>

        </div>

    </div>
@endsection
