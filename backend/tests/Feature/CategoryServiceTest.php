<?php

namespace Tests\Unit;

use App\Domain\Category\Services\CategoryService;
use App\Repositories\Constracts\CategoryRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $categoryRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->categoryRepositoryMock = Mockery::mock(CategoryRepositoryInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testIndex()
    {
        $this->categoryRepositoryMock->shouldReceive('getAll')->andReturn(['category1', 'category2']);
        $categoryService = new CategoryService($this->categoryRepositoryMock);

        $result = $categoryService->index();

        $this->assertEquals(['category1', 'category2'], $result);
    }

    public function testShow()
    {
        $categoryId = 1;
        $this->categoryRepositoryMock->shouldReceive('find')->with($categoryId)->andReturn('category1');
        $categoryService = new CategoryService($this->categoryRepositoryMock);

        $result = $categoryService->show($categoryId);

        $this->assertEquals('category1', $result);
    }

    public function testCreateCategory()
    {
        $categoryData = ['name' => 'Test Category'];
        $this->categoryRepositoryMock->shouldReceive('create')->with($categoryData)->andReturn('createdCategory');
        $categoryService = new CategoryService($this->categoryRepositoryMock);

        $result = $categoryService->createCategory((object)$categoryData);

        $this->assertEquals('createdCategory', $result);
    }

    public function testUpdateCategory()
    {
        $categoryId = 1;
        $categoryData = ['name' => 'Updated Category'];
        $this->categoryRepositoryMock->shouldReceive('update')->with($categoryId, $categoryData)->andReturn('updatedCategory');
        $categoryService = new CategoryService($this->categoryRepositoryMock);

        $result = $categoryService->updateCategory($categoryId, (object)$categoryData);

        $this->assertEquals('updatedCategory', $result);
    }

    public function testDeleteCategory()
    {
        $categoryId = 1;
        $this->categoryRepositoryMock->shouldReceive('delete')->with($categoryId)->andReturn(true);
        $categoryService = new CategoryService($this->categoryRepositoryMock);

        $result = $categoryService->deleteCategory($categoryId);

        $this->assertTrue($result);
    }
}
