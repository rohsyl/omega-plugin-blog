<?php
namespace rohsyl\OmegaPlugin\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'slug',
        'title',
        'icon',
        'description',
    ];

    public function blog_posts() {
        return $this->belongsToMany(BlogPost::class);
    }
}
