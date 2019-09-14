<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'shoulder',
        'headline',
        'hanger',
        'athor_id',
        'reporter_id',
        'featured_image_id',
        'featured_video_id',
        'video_position',
        'share_at',
        'published_at',
        'status',
        'Instant_article',
        'created_by',
        'updated_by'
    ];

    protected $table = 'posts';

    // public function parent(){
    //     return $this->belongsTo('Modules\Setting\Entities\Area','parent_id');
    // }
    public function postAreas(){
        return $this->hasMany('Modules\Post\Entities\PostArea','post_id');
    }

    public function postCategories(){
        return $this->hasMany('Modules\Post\Entities\PostCategory','post_id');
    }
    public function postContents(){
        return $this->hasMany('Modules\Post\Entities\PostContent','post_id');
    }
    public function postScrolls(){
        return $this->hasMany('Modules\Post\Entities\PostScroll','post_id');
    }
    public function postSections(){
        return $this->hasMany('Modules\Post\Entities\PostSection','post_id');
    }
    public function postTags(){
        return $this->hasMany('Modules\Post\Entities\PostTag','post_id');
    }
    public function postTopics(){
        return $this->hasMany('Modules\Post\Entities\PostTopic','post_id');
    }
    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }
}
