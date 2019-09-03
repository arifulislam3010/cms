<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    protected $table = 'contentcategories';
    protected $fillable = [];
    
    public function news_posts(){
        return $this->belongsToMany('Modules\Post\Entities\NewsPost','news_category');
    }
}
