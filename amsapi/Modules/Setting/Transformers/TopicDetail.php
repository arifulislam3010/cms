<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Entities\Content ;
use Modules\Setting\Transformers\Topic as TopicResource;
use Modules\ContentManager\Transformers\Content as ContentResource ;
class TopicDetail extends Resource
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
            'deadline'=> $this->deadline,
            'image'   =>new ContentResource (Content::where('id',$this->image_id)->first()) ,
            'status' => $this->status ,
            // 'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
