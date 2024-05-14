<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\CheckOut;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table ="order";
    // protected $fillable = [
    //     "products_id",
    //     "check_out_id",
    //     "customer_id",
    //     "status",
    //     "total",
    //     "address",
    //     'mop'
    // ];

    protected $fillable = [
        'customer_id',
        'fullname',
        'order_quantity_by_product',
        'order_product_id',
        'order_number',
        'status',
        'total',
        'address',
        'mop', // Method of Payment
    ];

    // protected $casts = [
    //     'check_out_ids' => 'array', // Cast JSON string to PHP array
    //     'check_out_product_id' => 'array'
    // ];

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class);
    // }
    // public function checkOut()
    // {
    //     return $this->belongsTo(CheckOut::class);
    // }
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }
    public function checkOut()
    {
        return $this->belongsTo(CheckOut::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
    
