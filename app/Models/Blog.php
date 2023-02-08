<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=['title','description','date','image'];

    public function comment()
    {
        return $this->hasMany(Comment::class,'blog_id','id')->where('parent','=',0);
    }
}
