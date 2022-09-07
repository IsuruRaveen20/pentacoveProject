<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'Introduction',
        'description',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function categoryName()
    {
        return $this->hasOne(Category::class, 'id', 'title');
    }

    public function images()
    {
        return $this->hasOne(Image::class,'id','image');
    }
}
