<?php

namespace Modules\FrontEnd\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Content extends Resource
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
            'title'=>$this->title,
            'file_name'=> \config::get("global.file_path").$this->file_name,
            // 'file_name'=>'http://localhost:8000/uploads/'.$this->file_name,
            // 'file_name'=>'http://bpress.api.istiak.net/public/uploads/'.$this->file_name,
            'type'=>$this->type
        ];
    }
}
