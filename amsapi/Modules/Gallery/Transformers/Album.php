<?php

namespace Modules\Gallery\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Transformers\Image  as ImageResource ;
use Modules\ContentManager\Entities\Content ;
class Album extends Resource
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
            'id'=> $this->id,
            'title'=> $this->title,
            'cover'=> new ImageResource(Content::where('id',$this->cover_id)->first()),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
