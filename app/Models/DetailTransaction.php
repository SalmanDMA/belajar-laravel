<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'price',
        'status',
    ];

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'transaction_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }
    protected $hidden;
}
