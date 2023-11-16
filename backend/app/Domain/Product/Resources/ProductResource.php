<?php
namespace App\Domain\Product\Resources;

use App\Domain\Category\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'id'=>$this->id,
           'name'=>$this->name,
           'description'=>$this->description,
           'price'=>(float)$this->price,
           'image'=>$this->image,
           'category'=>$this->Category
        ];
    }
}