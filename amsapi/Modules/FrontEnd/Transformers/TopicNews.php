<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\FrontEnd\Transformers\PostLite;

class topicNews extends Resource
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
            'id'    => $this->id ,
            'title' => $this->title ,
            'news'  => PostLite::collection($this->posts) ,
        ];
    }
}
