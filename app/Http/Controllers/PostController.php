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

    public function detailPostUI($id)
    {
        $post = $this->postService->findById($id);
        return view('detail', compact('post'));
    }

    public function detailPostAdmin($id)
    {
        $post = $this->postService->findById($id);
        return view('admin.post.detail', compact('post'));
    }

    public function edit(CategoryService $categoryService, $id)
    {
        $categories = $categoryService->getAll();
        $post = $this->postService->findById($id);
        return view('admin.post.edit', compact('post','categories'));
    }

    public function update(PostRequest $postRequest, $id)
    {
        $post = $this->postService->findById($id);
        $this->postService->update($postRequest, $post);
        toastr()->success('Cập nhập bài viết thành công!');
        return redirect()->route('post.index');

    }

    public function delete($id)
    {
        $post = $this->postService->findById($id);
        $this->postService->delete($post);
        toastr()->success('Xóa bài viết thành công!');
        return redirect()->route('post.index');
    }
}
