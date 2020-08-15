<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $this->categoryService->create($request);
        toastr()->success('Tạo mới danh mục thành công');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->update($request, $category);
        toastr()->success('Chỉnh sửa danh mục thành công!');
        return redirect()->route('category.index');
    }


}
