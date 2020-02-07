<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Transformers\Category as CategoryResource;
use Modules\Setting\Entities\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request )
    {
        
        // $categories = Category::where('parent_id',null)->get();
        $categories = Category::all();
       // return $categories ;
         return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {

        //return 'ok';
        $validator = $request->validate([
            'title'=>'required',
            'categoryStatus'=>'required',
            // 'parent_id'=>'required',

        ]);
        $category = new Category ;
        $category->title = $request->title ;
        $category->layout = $request->layout ;
        $category->parent_id = $request->parent_id ? $request->parent_id : null;
        $category->displayName = $request->displayName ;
        $category->displayNameColor = $request->displayNameColor ;
        $category->headerDesign = $request->headerDesign ;
        $category->headerDesignStatus = $request->headerDesignStatus ;
        $category->headerBackground = $request->headerBackground ;
        $category->headerBackgroundStatus = $request->headerBackgroundStatus ;
        $category->headerImage = $request->headerImage ;
        $category->categoryPageImage = $request->categoryPageImage ;
        // $category->parentTitle = $request->parentTitle ;
        $category->headerDisplay = $request->headerDisplay ;
        $category->homeDisplay = $request->homeDisplay ;
        $category->menubarDisplay = $request->menubarDisplay ;
        $category->photoDisplay = $request->photoDisplay ;
        $category->vedioDisplay = $request->vedioDisplay ;
        $category->categoryPageImageStatus = $request->categoryPageImageStatus ;
        $category->categoryStatus = $request->categoryStatus ;
        if($category->save()){
            return new CategoryResource($category);
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
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = $request->validate([
            'title' => 'required',
            'categoryStatus'=>'required',

        ]);
        $category = Category::findOrfail($id) ;    
        // $category->title = $request->title ;
        // $category->display_name = $request->display_name ;
        // $category->color = $request->color ;
        // $category->header_display = $request->header_display ;
        // $category->home_display = $request->home_display ;
        // $category->menubar_display = $request->menubar_display ;
        // $category->photo_display = $request->photo_display ;
        // $category->video_display = $request->video_display ;
        // $category->status = $request->status ;
        // $category->parent_id = $request->parent_id ? $request->parent_id : null;
        $category->title = $request->title ;
        $category->layout = $request->layout ;
        $category->parent_id = $request->parent_id ? $request->parent_id : null;
        $category->displayName = $request->displayName ;
        $category->displayNameColor = $request->displayNameColor ;
        $category->headerDesign = $request->headerDesign ;
        $category->headerDesignStatus = $request->headerDesignStatus ;
        $category->headerBackground = $request->headerBackground ;
        $category->headerBackgroundStatus = $request->headerBackgroundStatus ;
        $category->headerImage = $request->headerImage ;
        $category->categoryPageImage = $request->categoryPageImage ;
        // $category->parentTitle = $request->parentTitle ;
        $category->headerDisplay = $request->headerDisplay ;
        $category->homeDisplay = $request->homeDisplay ;
        $category->menubarDisplay = $request->menubarDisplay ;
        $category->photoDisplay = $request->photoDisplay ;
        $category->vedioDisplay = $request->vedioDisplay ;
        $category->categoryPageImageStatus = $request->categoryPageImageStatus ;
        $category->categoryStatus = $request->categoryStatus ;
        if($category->save()){
            return new CategoryResource($category);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        if($category->delete()){
            return new CategoryResource($category);
        }
    }
}
