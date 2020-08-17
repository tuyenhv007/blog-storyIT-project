<?php


namespace App\Http\Services;


use App\Http\Repositories\PostRepository;
use App\Post;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function findById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function create($request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title) ;
        $post->description = $request->desc;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $post->image = $path;
        } else {
            $post->image = 'images/default.jpg';
        }
        $post->user_id = Session::get('user')->id;
        $post->category_id = $request->category;
        $post->save();
    }

    public function update($request, $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title) ;
        $post->description = $request->desc;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $post->image = $path;
        } else {
            $post->image = 'images/default.jpg';
        }
        $post->user_id = Session::get('user')->id;
        $post->category_id = $request->category;
        $post->save();
    }

    public function delete($post)
    {
       $this->postRepository->destroy($post);
    }
}
