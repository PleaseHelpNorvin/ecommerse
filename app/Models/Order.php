<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ="order";
    protected $fillable = [
        // "products_id",
        // "check_out_id",
        "customer_id",
        "status",
        "total",
        "address",
        'mop'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    
}
