<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(WebUsers::class);
    }
    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
