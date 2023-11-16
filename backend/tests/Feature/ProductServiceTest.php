<?php

namespace Tests\Unit;

use App\Domain\Product\Services\ProductService;
use App\Repositories\Constracts\ProductRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $productRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepositoryMock = Mockery::mock(ProductRepositoryInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testIndex()
    {
        $this->productRepositoryMock->shouldReceive('getAll')->andReturn(['product1', 'product2']);
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->index();

        $this->assertEquals(['product1', 'product2'], $result);
    }

    public function testOrderByName()
    {
        $this->productRepositoryMock->shouldReceive('orderByName')->andReturn(['productA', 'productB']);
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->orderByName();

        $this->assertEquals(['productA', 'productB'], $result);
    }

    public function testOrderByPrice()
    {
        $this->productRepositoryMock->shouldReceive('orderByPrice')->andReturn(['productExpensive', 'productAffordable']);
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->orderByPrice();

        $this->assertEquals(['productExpensive', 'productAffordable'], $result);
    }

    public function testShow()
    {
        $productId = 1;
        $this->productRepositoryMock->shouldReceive('find')->with($productId)->andReturn('productDetails');
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->show($productId);

        $this->assertEquals('productDetails', $result);
    }

    public function testCreateProduct()
    {
        $productData = ['name' => 'New Product', 'description' => 'Product Description', 'price' => 29.99];
        $this->productRepositoryMock->shouldReceive('create')->with($productData)->andReturn('createdProduct');
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->createProduct((object)$productData);

        $this->assertEquals('createdProduct', $result);
    }

    public function testUpdateProduct()
    {
        $productId = 1;
        $productData = ['name' => 'Updated Product', 'price' => 39.99];
        $this->productRepositoryMock->shouldReceive('update')->with($productId, $productData)->andReturn('updatedProduct');
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->updateProduct($productId, (object)$productData);

        $this->assertEquals('updatedProduct', $result);
    }

    public function testDeleteProduct()
    {
        $productId = 1;
        $this->productRepositoryMock->shouldReceive('delete')->with($productId)->andReturn(1);
        $productService = new ProductService($this->productRepositoryMock);

        $result = $productService->deleteProduct($productId);

        $this->assertEquals(1, $result);
    }

   
}
