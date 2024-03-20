<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'code_transaction',
        'total_qty',
        'total_price',
        'name_customer',
        'address',
        'phone',
        'expedition',
        'status',
    ];

    protected $hidden;
}
