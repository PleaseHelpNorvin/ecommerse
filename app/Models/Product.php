<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'productName',
        'description',
        'category_id',
        'color_id',
        // 'stockQuantity',
        'price',
        'imagePath'
    ];

    public function checkOuts()
    {
        return $this->hasMany(CheckOut::class);
    }
}