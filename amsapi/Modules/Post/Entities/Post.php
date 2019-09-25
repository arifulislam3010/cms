<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [];

    // tag *
    // topic * 
    // category *
    // area *
    // content *
    // scroll
    public function tags(){

        return $this->belongsToMany('Modules\Setting\Entities\Tag','post_tags');
    }
    public function topics(){

        return $this->belongsToMany('Modules\Setting\Entities\Topic','post_topics');
    }

    public function areas(){

        return $this->belongsToMany('Modules\Setting\Entities\Area','post_areas');
    }

    public function categories(){

        return $this->belongsToMany('Modules\Setting\Entities\Category','post_categories');
    }
     
    public function scrolls(){

        return $this->belongsToMany('Modules\Setting\Entities\Scroll','post_scrolls');
    }
     
    public function contents(){
        return $this->belongsToMany('Modules\ContentManager\Entities\Content','post_contents');
    }

    
}
