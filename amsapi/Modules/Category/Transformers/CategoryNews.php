<?php

namespace Modules\Category\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\FrontEnd\Transformers\PostLite ;
class categoryNews extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'title' => $this->title,
            'news'  => PostLite::collection( $this->posts) ,
            'layout' => $this->layout ,
        ];
    }
}
