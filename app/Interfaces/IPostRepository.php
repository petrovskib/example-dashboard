<?php
namespace App\Interfaces;

use App\Models\Post;
use Illuminate\Support\Collection;

interface IPostRepository
{
    public function all(): Collection;

    public function store(Post $post);

    public function update(Post $request, $post);

    public function destroy(int $id);

    public function show(int $id);

}
