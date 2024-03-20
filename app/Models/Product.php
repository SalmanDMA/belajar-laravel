<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'sku',
        'name',
        'type',
        'category',
        'price',
        'discount',
        'qty',
        'qty_out',
        'is_active',
        'image'
    ];
    protected $hidden;

    // public function product()
    // {
    //     return $this->hasOne(Cart::class, 'id');
    // }
}
