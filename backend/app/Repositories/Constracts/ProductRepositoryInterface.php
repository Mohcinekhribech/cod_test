<?php
namespace App\Repositories\Constracts;

interface ProductRepositoryInterface
{
    public function getAll();
    
    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
    public function orderByName();
    public function orderByPrice();
}