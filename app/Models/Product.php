<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_name',
        'is_salable',
        'is_available',
    ];

    /**
     * رابطه با تراکنش‌ها (یک محصول می‌تواند چند تراکنش داشته باشد)
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
