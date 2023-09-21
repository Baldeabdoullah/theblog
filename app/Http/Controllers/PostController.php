<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('post.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $imageName = $request->image->store('posts');
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'categorie_id' => $request->categorie
        ]);

        return redirect()->route('dashboard')->with('success', 'votre post  a ete cree');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $updatearray = ([
            'title' => $request->title,
            'content' => $request->content,

            'categorie_id' => $request->categorie
        ]);

        if ($request->image != null) {
            $imageName = $request->image->store('posts');
            $updatearray = array_merge($updatearray, [
                'image' => $imageName
            ]);
        }

        $post->update($updatearray);


        return redirect()->route('dashboard')->with('success', 'votre post  a été modifié');
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'votre post  a été suprimé');
    }
}
