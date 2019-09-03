<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = [];

    public function news_posts(){
       return  $this->belongsToMany(NewsPost::class,'news_post_tag');
    }
}
