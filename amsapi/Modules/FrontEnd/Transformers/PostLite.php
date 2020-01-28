<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\FrontEnd\Transformers\Content as ContentResource;

class PostLite extends Resource
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
            'id' => $this->id ,
            'shoulder'=>$this->shoulder,
            'headline'=>$this->headline,
            'hanger'=>$this->hanger,
            'FeaturedImage'=> new ContentResource($this->FeaturedImage),
            'FeaturedVideo'=> new ContentResource($this->FeaturedVideo),  
        ];
    }
}
