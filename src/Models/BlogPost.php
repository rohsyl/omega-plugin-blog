<?php
namespace rohsyl\OmegaPlugin\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use rohsyl\OmegaCore\Models\Media;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'author_id',
        'author_type',
        'featured_media_id',
        'slug',
        'title',
        'introduction',
        'description',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author() {
        return $this->morphTo('author');
    }

    public function featured_media() {
        return $this->belongsTo(Media::class, 'featured_media_id');
    }

    public function blog_categories() {
        return $this->belongsToMany(BlogCategory::class);
    }
}