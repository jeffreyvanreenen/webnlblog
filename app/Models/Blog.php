<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
      'image',
      'name',
      'post',
      'author',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',
    ];

    public function author() {
        return $this->belongsTo(User::class,'author', 'id');
    }

    public function categorie() {
        return $this->belongsToMany(Category::class, 'blog_categories');
    }
}
