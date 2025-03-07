<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class BlogDetail extends Model
{
    protected $table = 'blog_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'lang',
        'short_description',
        'long_description',
        'blog_id',
        'user_id'
    ];
    use HasFactory;
    public function Blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
