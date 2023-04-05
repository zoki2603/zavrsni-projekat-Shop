<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_product',
        'price',
        'quantity',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
