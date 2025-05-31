<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'register_date',
        'phone',
        'province',
        'city',
        'gender',
    ];
    // ارتباط با تراکنش‌ها
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
