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
        return [
            'id'=> $this->id,
            'label'=> $this->title,
            // 'parent'=> $this->parent->title,
            'parent_id' => $this->parent_id ,
            'display_name' => $this->displayName ,
            'color' => '',
            'header_display' => $this->headerDisplay ,
            'home_display' => $this->homeDisplay ,
            'menubar_display' => $this->menubarDisplay ,
            'photo_display' => $this->photoDisplay ,
            'video_display' => $this->videoDisplay ,
            'status' => $this->categoryStatus ,

            'children'   => CategoryResource::collection($this->child),
            'updated_by' => $this->updatedBy ? $this->updatedBy->name : "" ,
            'created_by' => $this->createdBy ? $this->createdBy->name : "" ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
