<?php 
namespace App\Repositories\Constracts;

interface CategoryRepositoryInterface
{
    public function getAll();
    
    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}