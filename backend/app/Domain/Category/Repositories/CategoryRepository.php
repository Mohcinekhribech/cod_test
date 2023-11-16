<?php
namespace App\Domain\Category\Repositories;

use App\Domain\Category\Category;
use App\Repositories\Constracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function find($id)
    {
        return Category::find($id);
    }
    public function getAll()
    {
        return Category::all();
    }
    public function create(array $data)
    {
        return Category::create($data);
    }
    public function update($id, array $data)
    {
        $category = Category::find($id);
        $category->update($data);
        return $category;
    }
    public function delete($id)
    {
        return Category::destroy($id);
    }
}