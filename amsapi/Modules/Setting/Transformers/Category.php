<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Setting\Transformers\Category as CategoryResource;
class Category extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        'id'=> $this->id,
            'title'=> $this->title,
            //'parent'=> $this->parent->title,
            'childs'   => CategoryResource::collection($this->child),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
    }
}
