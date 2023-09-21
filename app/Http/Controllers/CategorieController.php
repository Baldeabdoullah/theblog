<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('dashboard', compact('categories', 'posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('categorie.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard')->with('success', 'votre categorie a été cree');
    }

    public function destroy(Request $request, $id)
    {
        $categorie = Category::findOrFail($id);
        $categorie->delete();
        return redirect()->route('dashboard')->with('success', 'votre categorie a été supprimé');
    }
}
