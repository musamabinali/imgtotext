<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Jetstream;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    use HasFactory;

    protected $fillable = [
        'feature_img',
        'slug',
        'user_id',
        'type',
        'status',
        'author_id',
        'table_of_content'
    ];

    /**
     * Get the team that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function BlogDetail()
    {
        return $this->hasMany(BlogDetail::class);
    }
}
