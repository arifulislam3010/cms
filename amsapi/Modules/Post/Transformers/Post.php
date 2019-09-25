<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use App\User ;
class Post extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $author   = User::findOrfail($this->author_id)->name;
        $reporter = User::findOrfail($this->reporter_id)->name;
        $created_by = null ;
        $updated_by = null ;
        if($this->created_by!=null) $created_by = User::findOrfail($this->created_by)->name;
        if($this->updated_by!=null) $updated_by = User::findOrfail($this->updated_by)->name;
        return [
            'id' => $this->id ,
            'shoulder' => $this->shoulder ,
            'headline' => $this->headline ,
            'author' => $author ,
            'reporter' => $reporter,
            'created_by' => $created_by ,
            'updated_by' => $updated_by ,
            'published_at' => $this->published_at , 
            'created_at' => $this->created_at , 
        ];
    }
}
