<?php

namespace Modules\FrontEnd\Entities;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'post_id',
        'category_id',
        'created_by',
        'updated_by'
    ];

    protected $table = 'post_categories';

    public function post()
    {
        return $this->belongsTo('Modules\Post\Entities\Post', 'post_id');
    }
}
