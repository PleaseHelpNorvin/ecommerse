<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOutHistory extends Model
{
    use HasFactory;
    protected $table = "check_out_history";
    protected $fillable = [
        "clientuser_id",
        "product_id ",
        "color"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeByClientUser($query, $clientUserId)
    {
        return $query->where('clientuser_id', $clientUserId);
    }
    public function checkouts()
    {
        return $this->belongsToMany(CheckOutHistory::class);
    }
}
