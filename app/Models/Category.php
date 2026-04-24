<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Menentukan kolom apa saja yang boleh diisi secara massal (mass assignment)
    protected $fillable = ['name'];

    // Membuat relasi 'hasMany' ke model Product
    // Artinya: Satu kategori dapat memiliki banyak produk (One-to-Many)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
