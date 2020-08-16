<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\CategoryService;
use App\Http\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();
        return view('admin.post.list', compact('posts'));
    }

    public function create(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostRequest $postRequest)
    {
        $this->postService->create($postRequest);
        toastr()->success('Bài viết đã được xuất bản!');
        return redirect()->route('post.index');
    }
}
