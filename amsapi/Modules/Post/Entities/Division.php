<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

    protected $table ='division';
    protected $fillable = [];

    public function news_posts(){
        return  $this->belongsToMany(Division::class,'news_division');
     }

     
}
