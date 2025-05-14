<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Jika kamu menggunakan guarded atau fillable, tetap sertakan
    protected $fillable = ['title', 'synopsis', 'cover_image', 'category_id'];

    // Tambahkan relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

