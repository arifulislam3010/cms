<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $fillable = [];

    public function media_gallery(){
        return $this->belongsTo('Modules\ContentManager\Entities\MediaGallery','media_gallery_id');
    }
    public function medias(){
        return $this->hasmany('Modules\ContentManager\Entities\Media','album_id');
    }
}
