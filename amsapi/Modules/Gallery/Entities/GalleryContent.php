<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;

class GalleryContent extends Model
{
    protected $fillable = [
        'caption',
        'content',
        'gallery_id',
        'created_by',
        'updated_by'
    ];

    protected $table = 'gallery_contents';

    public function gallery(){
        return $this->belongsTo('Modules\Gallery\Entities\Gallery','gallery_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }
}
