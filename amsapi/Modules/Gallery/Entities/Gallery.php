<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'cover',
        'created_by',
        'updated_by'
    ];

    protected $table = 'galleries';

    public function gContents(){
        return $this->hasMany('Modules\Gallery\Entities\GalleryContent','gallery_id');
    }

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }
}
