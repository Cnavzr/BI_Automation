<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // فیلدهایی که اجازه پر شدن از طریق mass-assignment رو دارن
    protected $fillable = [
        'invoice_id',
        'quantity',
        'product_price',
        'sale_type',
        'transaction_date',
        'customer_id',
        'product_id',
    ];

    /**
     * رابطه با مدل Customer (هر تراکنش متعلق به یک مشتری است)
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * رابطه با مدل Product (هر تراکنش متعلق به یک محصول است)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
