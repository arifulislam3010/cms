<?php

namespace Modules\FrontEnd\Entities;

use Illuminate\Database\Eloquent\Model;

class PostSection extends Model
{
    protected $fillable = [
        'post_id',
        'section_id',
        'created_by',
        'updated_by'
    ];

    protected $table = 'post_sections';

    public function post(){
        return $this->belongsTo('Modules\FrontEnd\Entities\Post','post_id');
    }
}
