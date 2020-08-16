<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $this->categoryService->create($categoryRequest);
        toastr()->success('Tạo mới thể loại thành công');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->update($categoryRequest, $category);
        toastr()->success('Chỉnh sửa thể loại thành công!');
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->delete($category);
        toastr()->success('Xóa thể loại thành công!');
        return redirect()->route('category.index');
    }


}
