<?php

namespace Modules\FrontEnd\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'shoulder',
        'headline',
        'hanger',
        'athor_id',
        'reporter_id',
        'featured_image_id',
        'featured_video_id',
        'video_position',
        'share_at',
        'published_at',
        'status',
        'Instant_article',
        'created_by',
        'updated_by'
    ];

    protected $table = 'posts';
}
