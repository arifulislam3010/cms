<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $fillable = [];
    
    public function media_gallery(){
        return $this->belongsTo('Modules\ContentManager\Entities\MediaGallery','media_gallery_id');
    }
    public function album(){
        return $this->belongsTo('Modules\ContentManager\Entities\Album','album_id');
    }

    public function news_posts(){
        return $this->belongsToMany('Modules\Post\Entities\NewsPost','news_media');
    }
}
