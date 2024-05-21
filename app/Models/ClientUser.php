<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUser extends Model
{
    use HasFactory;
    protected $table = "client_user";
    protected $fillable = [
        'username',
        'password',
        'email',
        'fullname',
        'phonenumber'
        // 'imagePath'
    ];
}
