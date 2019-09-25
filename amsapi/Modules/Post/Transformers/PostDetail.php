<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\ContentManager\Entities\User ;
use Modules\ContentManager\Transformers\Image as ImageResource ;

use Modules\Setting\Transformers\Tag as TagResource ;
use Modules\Setting\Transformers\Topic as TopicResource ;
use Modules\Setting\Transformers\Category as CategoryResource ;
use Modules\Setting\Transformers\Area as AreaResource ;

class PostDetail extends Resource
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
            'id' => $this->id,
            'shoulder' => $this->shoulder,
            'headline' => $this->headline,
            'hanger' => $this->hanger,
            'reporter' => User::where('id',$this->reporter_id)->first(),
            'author' => User::where('id',$this->author_id)->first(),
            'content' => $this->content,
            // featured img , video 
            'more_photo_arr' => ImageResource::collection($this->contents),

            'share_at' => $this->share_at,
            'publish_at' => $this->published_at,
            'status' => $this->status,
            'instant_article' => $this->instant_article,
            'news_tags' => TagResource::collection($this->tags),
            'selected_topics' => TopicResource::collection($this->topics),
            'selected_categories' => CategoryResource::collection($this->categories),
            'selected_areas' => AreaResource::collection($this->areas),

        ];
    }
}
