<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "DESC")->paginate(3);

        return view('posts.index', [
            "posts" => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::with("comments.user")->findOrFail($id);

        return view('posts.show', [
            "post" => $post,
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect(route("posts.show", $id));
    }
    public function create()
{
    return view('posts.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'preview' => 'required',
        'description' => 'required',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Обработка и сохранение изображения
    $thumbnailPath = $request->file('thumbnail')->store('public/posts');

    // Создание нового поста
    Post::create([
        'title' => $request->input('title'),
        'preview' => $request->input('preview'),
        'description' => $request->input('description'),
        'thumbnail' => str_replace('public/', '', $thumbnailPath),
    ]);

    return redirect()->route('index')->with('success', 'Пост успешно добавлен.');
}
}
