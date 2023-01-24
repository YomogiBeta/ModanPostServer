<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;


    protected $casts = [
        'id' => 'string',
        'post_id' => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'path',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
