<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    protected $table = 'newspost';
    protected $fillable = [];

    public function tags(){ 
        return $this->belongsToMany(Tag::class,'news_post_tag');
    }

    public function media(){
        return $this->belongsToMany('Modules\Contentmanager\Entities\Media','news_media');
    }

    public function category(){
        return $this->belongsToMany('Modules\Contentmanager\Entities\ContentCategory','news_category');
    }

    public function division(){
        return $this->belongsToMany(Division::class,'news_division');
    }
}
