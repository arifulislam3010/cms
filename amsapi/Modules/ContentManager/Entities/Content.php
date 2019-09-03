<?php

namespace Modules\ContentManager\Entities;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [];

    public function createdBy(){
        return $this->belongsTo('App\User','created_by');
    }
    public function updatedBy(){
        return $this->belongsTo('App\User','updated_by');
    }
}
