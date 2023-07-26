<?php


namespace App\Repositories;

use App\Interfaces\IPostRepository;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository implements IPostRepository
{
    public function all(): Collection
    {
        return Post::all();
    }

    public function store(Post $post)
    {
        return $post->save();
    }

    public function update(Post $request, $post)
    {
        $post = Post::find($post->id);
        return $post->update($request->toArray());
    }

    public function destroy(int $id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function show(int $id): ?Post
    {
        return Post::find($id);
    }
}
