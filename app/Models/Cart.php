<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        // Other fillable fields in your Cart model
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
