<?php
namespace App\Domain\Product\Repositories;

use App\Domain\Product\Product;
use App\Repositories\Constracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function find($id)
    {
        return Product::find($id);
    }
    public function orderByName()
    {
        return Product::orderBy('name')->get();
    }
    public function orderByPrice()
    {
        return Product::orderBy('price')->get();
    }
    public function getAll()
    {
        return Product::all();
    }
    public function create(array $data)
    {
        return Product::create($data);
    }
    public function update($id, array $data)
    {
        $product = Product::find($id);
        $product->update($data);
        return $product;
    }
    public function delete($id)
    {
        return Product::destroy($id);
    }
}