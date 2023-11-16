<?php
namespace App\Domain\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id'
    ];
    public function Category()
    {
        return $this->belongsTo(Product::class,'category_id','id');
    }
}