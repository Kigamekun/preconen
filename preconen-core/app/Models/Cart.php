<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','order_id', 'product_id', 'qty', 'total', 'has_paid'];

    use HasFactory;
}
