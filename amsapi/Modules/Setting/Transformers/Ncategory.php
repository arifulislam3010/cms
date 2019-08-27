<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Setting\Transformers\Ncategory as NcategoryResource;

class Ncategory extends Resource
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
            //'parent'=> $this->parent->title,
            'childs'   => NcategoryResource::collection($this->child),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
