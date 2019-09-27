<?php

namespace Modules\Gallery\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Transformers\Image;
use Modules\ContentManager\Entities\Content;
class AlbumDetail extends Resource
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
            'id'=> $this->id ,
            'title' => $this->title ,
            'cover' => new Image(Content::where('id',$this->cover_id)->first()) ,
            'cover_id' => $this->cover_id ,
            'more_photo' => Image::collection($this->contents) ,
        ];
    }
}
