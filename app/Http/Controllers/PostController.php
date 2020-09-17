<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        //$this->authorize('view-any', Post::class);
        $posts = Post::query()
            ->latest()
            ->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }


    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.form', [
            'categories' => auth()->user()->categories
        ]);
    }


    public function store(PostFormRequest $request)
    {
        $this->authorize('create', Post::class);
        $post = auth()->user()->posts()->create($request->validated());
        return redirect()->route('posts.show', $post);
    }


    public function show(Post $post)
    {
        $this->authorize('view', $post);
        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.form', [
            'post' => $post
        ]);
    }


    public function update(PostFormRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->validated());
        return redirect()->route('posts.show');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        return redirect()->route('posts.index');
    }
}
