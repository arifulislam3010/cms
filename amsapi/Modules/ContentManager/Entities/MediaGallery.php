<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
    protected $table = 'mediagallery';
    protected $fillable = [];

    public function albums(){
        return $this->hasmany('Modules\ContentManager\Entities\Album','media_gallery_id');
    }
    public function medias(){
        return $this->hasmany('Modules\ContentManager\Entities\Media','media_gallery_id');
    }
}
