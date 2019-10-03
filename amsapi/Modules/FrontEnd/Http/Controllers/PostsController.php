<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\FrontEnd\Entities\Category;
use Modules\FrontEnd\Entities\Post;
use Modules\FrontEnd\Entities\PostSection;


use Modules\Post\Entities\PostCategory;
use Modules\Post\Transformers\Post as PostResource;
use Modules\FrontEnd\Transformers\Category as CategoryResource;
use Modules\FrontEnd\Transformers\PostSection as PostSectionResource;

use Modules\Post\Transformers\PostDetail ;
use Modules\Setting\Entities\Section;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $post = Post::orderBy('id', 'DESC')->get();
        return PostResource::collection($post);
    }

   public function category()
   {
       $category = Category::all();
       return CategoryResource::collection($category);
   }


    public function postSection ()
    {
        $section = PostSection::orderBy('id', 'DESC')->get();
        return PostSectionResource::collection($section);
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
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('frontend::edit');
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
