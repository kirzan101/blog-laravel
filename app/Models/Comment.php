<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'post_id'
    ];

    /**
     * associate comment in post
     *
     * @return object
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
