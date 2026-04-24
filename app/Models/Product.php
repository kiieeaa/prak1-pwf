<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Membuat relasi 'belongsTo' ke model Category
    // Artinya: Setiap produk pasti dimiliki atau tergabung dalam satu kategori (Many-to-One)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
