<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Interfaces\IPostRepository;
use App\Models\Post;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(IPostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepository->all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $this->postRepository->store($request->toPost());
        return redirect()->action([PostController::class, 'index']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, Post $post)
    {
        $this->postRepository->update($request->toPost(), $post);
        return redirect()->action([PostController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->postRepository->destroy($post->id);
        return redirect()->action([PostController::class, 'index']);
    }
}
