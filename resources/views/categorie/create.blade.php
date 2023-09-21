@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <input type="text" name="name" placeholder="titre">
            </div>

            <button type="submit">Valider</button>

        </form>
    </div>
@endsection
