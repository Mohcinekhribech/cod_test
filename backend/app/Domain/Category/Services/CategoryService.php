<?php
namespace App\Domain\Category\Services;

use App\Repositories\Constracts\CategoryRepositoryInterface;

class CategoryService 
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return $this->categoryRepository->getAll();
    }

    public function show($id)
    {
        return $this->categoryRepository->find($id);
    }
    public function createCategory($data)
    {
        $dataArray = is_object($data) ? $data->toArray() : $data;
        return $this->categoryRepository->create($dataArray);
    }
    public function updateCategory($id,$data)
    {
        $dataArray = is_object($data) ? $data->toArray() : $data;
        return $this->categoryRepository->update($id,$dataArray);
    }
    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }
}