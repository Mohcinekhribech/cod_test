<?php
namespace App\Domain\Category;

use App\Domain\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $fillable = ["name","parent_category_id"];
    public function Product()
    {
        return $this->hasMany(Product::class,'categories_id','id');
    }
    public function ParentCategory()
    {
        return $this->belongsTo(Category::class,'parent_category_id','id');
    }
    public function Childs()
    {
        return $this->hasMany(Category::class,'parent_category_id','id');
    }
}