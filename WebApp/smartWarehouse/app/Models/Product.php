<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Đảm bảo các trường này có thể được gán giá trị hàng loạt
    protected $fillable = [
        'name', 
        'description', 
        'unit', 
        'purchase_price', 
        'sale_price', 
        'quantity', 
        'import_date', 
        'expiration_date', 
        'supplier',
    ];
}
