<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\FrontEnd\Entities\SiteInfo;
use Modules\FrontEnd\Entities\Language;
use Modules\FrontEnd\Entities\Topic;
use Modules\FrontEnd\Entities\Content;
use Modules\FrontEnd\Entities\Post;
use Modules\FrontEnd\Entities\Area;
use Modules\FrontEnd\Transformers\Area as AreaResource;
use Modules\FrontEnd\Transformers\topicNews ;
use Modules\FrontEnd\Transformers\PostLite;

use Illuminate\Support\Facades\DB;
use Modules\FrontEnd\Transformers\Content as ContentResource ;
use Modules\FrontEnd\Transformers\Language as LanguageResource;
use Modules\FrontEnd\Transformers\SiteInfo as SiteInfoResource;
class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function lanAll()
    {
        $Language = Language::all();
        return LanguageResource::collection($Language);
    }

    public function lanGet($id){
        $Language = Language::where('id',$id)->get();
        return new LanguageResource($Language);
    }

    public function SiteInfo($id){
        $SiteInfo = SiteInfo::where('language_id',$id)->first();
        return new SiteInfoResource($SiteInfo);
    }


    public function create()
    {
        return view('frontend::create');
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

    public function topics(Request $request){
        
        $topics = Topic::all() ;
        return topicNews::collection($topics) ;

    }
    // set of images from all albums 
    public function albumImgs(){
        $content_ids = DB::table('album_contents')->select('content_id')->get()->toArray() ;
        $content_ids = array_map(function($v){return $v->content_id;},$content_ids);
        $imgs = Content::whereIn('id',$content_ids)->where('type','image')->get();
        return ContentResource::collection($imgs) ;

    }

    public function search(Request $request){
        // return "ok";
        $result = [] ;
        if($request->has('q')){
            $query = $request->q ;
            $result = Post::where('headline','like','%'.$query.'%')
            ->orWhere('hanger','like','%'.$query.'%')            
            ->orWhere('shoulder','like','%'.$query.'%')            
            ->orWhere('content','like','%'.$query.'%')            
            ->paginate(30);
        }else{ // area search 
            // ids 
            // $area1 = $request->area1 == 'undefined' ? null : $request->area1 ;
            // $area2 = $request->area2 == 'undefined' ? null : $request->area2 ;
            // $area3 = $request->area3 == 'undefined' ? null : $request->area3 ;
            // $temp = DB::table('post_areas')->select('area_id')
            // ->when($area1,function($q) use($area1){ 
            //     return $q->where('area_id','=',$area1) ;  
            // })
            // ->when($area2,function($q) use($area2){ 
            //     return $q->where('area_id',$area2) ;  
            // })
            // ->get();
            // return $temp ;
        }
        // $query = $request->has('q') ? $request->q : '' ;
        //todo 
        return PostLite::collection($result) ;
    }
    public function areas(Request $request){
        $areas = Area::all();
        return AreaResource::collection($areas);
    }
    public function areaSearch(Request $request){
        // return "ok";
        // we only need the lowest child 
        $area = 0 ;
        if( isset($request->area1) && strval($request->area1) != 'undefined'){
            $area = $request->area1;
        }
        if( isset($request->area2) && strval($request->area2) != 'undefined'){
            $area = $request->area2;
        }
        if( isset($request->area3) && strval($request->area3) != 'undefined'){
            $area = $request->area3;
        }
        // return $area ;                                                
        $post_ids = DB::table('post_areas')->select('post_id')->where('area_id','=',$area)->get()->toArray();
        $post_ids = array_map(function($v){
            return $v->post_id ;
        },$post_ids);
        return PostLite::collection(Post::findMany($post_ids)) ;

    }
}
