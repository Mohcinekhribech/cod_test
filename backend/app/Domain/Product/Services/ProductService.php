<?php
namespace App\Domain\Product\Services;

use App\Repositories\Constracts\ProductRepositoryInterface;

class ProductService 
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return $this->productRepository->getAll();
    }
    public function orderByName()
    {
        return $this->productRepository->orderByName();
    }
    public function orderByPrice()
    {
        return $this->productRepository->orderByPrice();
    }

    public function show($id)
    {
        return $this->productRepository->find($id);
    }
    public function createProduct($data)
    {
        $dataArray = is_object($data) ? $data->toArray() : $data;
        return $this->productRepository->create($dataArray);
    }
    public function updateProduct($id,$data)
    {
        $dataArray = is_object($data) ? $data->toArray() : $data;
        return $this->productRepository->update($id,$dataArray);
    }
    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }
}