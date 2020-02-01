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
        // $pos=strpos($this->content, ' ', 400);
        // $partial_content = substr($this->content,0,$pos );
        return [
            'id' => $this->id ,
            'shoulder'=>$this->shoulder,
            'headline'=>$this->headline,
            'hanger'=>$this->hanger,
            'partial_content'=> $this->content == null ?  '': $this->content,
            'FeaturedImage'=> new ContentResource($this->FeaturedImage),
            'FeaturedVideo'=> new ContentResource($this->FeaturedVideo),  
        ];
    }
}
