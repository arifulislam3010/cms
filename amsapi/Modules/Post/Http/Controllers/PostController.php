<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        // return array($request->tag_ids) ;
        $post = new Post;
        $post->shoulder = $request->shoulder;
        $post->headline = $request->headline;
        $post->reporter = $request->reporter;
        $post->author = $request->author['id'];
        // $post->content_id      = $request->content_id ['id']    ;
        $post->video_url = $request->video_url;
        $post->video_position = $request->video_position;
        $post->video_url = $request->video_url;
        $post->share_at = $request->share_at;
        $post->publish_at = $request->publish_at;
        $post->status = $request->status;
        $post->instant_article = $request->instant_article;
        $post->topic = $request->selected_topics['id'];
        // $post->division = $request->selected_divisions;
        $post->position = $request->selected_position['id'];
        $post->scroll = $request->selected_scroll['id'];
        // $post->category = $request->selected_category['id'];

        // many to many
        // tag
        // media
        // division
        // category
        // $post->save();
        // $post->tags()->attach(array($request->tag_ids));
        // $post->division()->attach(array($request->division_ids));
        // media
        if ($post->save()) {
            return $post;
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
