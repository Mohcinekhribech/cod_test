<?php
namespace App\Http\Controllers;

use App\Domain\Product\Resources\ProductResource;
use App\Domain\Product\Services\ProductService ;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection($this->productService->index());
    }

    public function orderByName()
    {
        return ProductResource::collection($this->productService->orderByName());
    }
    public function orderByPrice()
    {
        return ProductResource::collection($this->productService->orderByPrice());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->productService->createProduct($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ProductResource($this->productService->show($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->productService->updateProduct($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->productService->deleteProduct($id);
    }
}
