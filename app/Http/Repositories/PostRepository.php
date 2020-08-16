<?php


namespace App\Http\Repositories;


use App\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->all();
    }

    public function findById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function save($post)
    {
       return $post->save();
    }

    public function destroy($post)
    {
        $post->delete();
    }
}
