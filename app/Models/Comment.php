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
        return $this->hasMany(Comment::class,'parent','id')->limit(2);
    }
    public function all_replays()
    {
        return $this->hasMany(Comment::class,'parent','id');
    }
}
