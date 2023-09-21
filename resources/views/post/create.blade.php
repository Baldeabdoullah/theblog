@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <input type="text" name="title" placeholder="titre">
            </div>

            <div>
                <textarea name="content" id="" cols="30" placeholder="contenu" rows="10"></textarea>
            </div>

            <div>
                <label for="">Image</label>
                <input type="file" name="image">
            </div>

            <div>
                <label for="categorie">Categorie</label>
                <select name="categorie" id="categorie">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Valider</button>

        </form>
    </div>
@endsection
