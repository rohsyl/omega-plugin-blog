<?php
namespace rohsyl\OmegaPlugin\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComment extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'author_id',
        'author_type',
        'blog_post_id',
        'blog_comment_id',
        'author_name',
        'content',
    ];

    public function author() {
        return $this->morphTo('author');
    }

    public function blog_post() {
        return $this->belongsTo(BlogPost::class);
    }

    public function blog_comment() {
        return $this->belongsTo(BlogComment::class);
    }
}
