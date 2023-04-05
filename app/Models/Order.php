<?php

namespace App\Models;

use App\Models\User;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id_user',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
