@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div>
                <input type="text" name="title" value="{{ $post->title }}" placeholder="titre">
            </div>

            <div>
                <textarea name="content" id="" cols="30" placeholder="contenu" rows="10">
                    {{ $post->content }}
                </textarea>
            </div>

            <div>
                <label for="">Image</label>
                <input type="file" name="image">
            </div>

            <div>
                <label for="categorie">Categorie</label>
                <select name="categorie" id="categorie">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $post->categorie_id === $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Valider</button>

        </form>
    </div>
@endsection
