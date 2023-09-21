<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        a {
            text-decoration: none;
            color: #000
        }

        .action {
            display: flex;
            justify-content: space-around
        }
    </style>
</head>

<body>

    <div class="container my-5">

        @if (session('success'))
            {{ session('success') }}
        @endif

        <h4 class="text-center "><a class="btn btn-dark text-light" href="{{ route('posts.create') }}">Creer un
                Poste</a></h4>

        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">image</th>
                    <th scope="col">titre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>
                            <img src="{{ asset('/storage/' . $post->image) }}" style="width: 100px" alt="">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <div class="action">

                                <div>
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        <i class="fa-solid fa-pen-to-square">
                                        </i>
                                    </a>

                                </div>

                                <div>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-dark" type="submit"
                                            onclick="return confirm('etes vous sure ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>


    <!--CATEGORIE-->

    <div class="container my-5">


        <h4 class="text-center "><a class="btn btn-dark text-light" href="{{ route('categories.create') }}">Creer une
                Categorie</a></h4>

        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>

                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $categorie)
                    <tr>
                        <th scope="row">{{ $categorie->id }}</th>

                        <td>{{ $categorie->name }}</td>
                        <td>
                            <div class="action">

                                <div>
                                    <a href="">
                                        <i class="fa-solid fa-pen-to-square">
                                        </i>
                                    </a>

                                </div>

                                <div>
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-dark" type="submit"
                                            onclick="return confirm('etes vous sure ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>


    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
