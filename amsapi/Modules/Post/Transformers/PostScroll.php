<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class PostScroll extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
