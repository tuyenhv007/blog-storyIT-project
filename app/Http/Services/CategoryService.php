<?php


namespace App\Http\Services;


use App\Category;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function create($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
    }

    public function update($request, $category)
    {
        $category->name = $request->name;
        $category->save();
    }

    public function delete($category)
    {
        $this->categoryRepository->destroy($category);
    }
}
