<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=['blog_id','comments','parent'];

    public function replays()
    {
        return $this->hasMany(Comment::class,'parent','id');
    }
}
