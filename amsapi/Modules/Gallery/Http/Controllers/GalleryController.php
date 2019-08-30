<?php

namespace Modules\Gallery\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Entities\GalleryContent;

use Modules\Gallery\Transformers\Gallery as GalleryResource;

class GalleryController extends Controller
{
    public function index(Request $request){


        // $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        // $role = Sentinel::findRoleById($role_id);
        // $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $gallery = '';

        // if ($role->hasAccess(['department.view'])){
        //     $department = Department::when($search_item , function($q) use($search_item,$user_id){return $q->where('created_by',$user_id)->where('name','like',"%$search_item%");})
        //         ->when($user_id , function($q) use($user_id){return $q->where('created_by',$user_id);})
        //        ->paginate(10);
        // }
        // if ($role->hasAccess(['department.viewall'])){
          return $gallery = Gallery::when($search_item , function($q) use($search_item){return $q->where('name','like',"%$search_item%");})
           ->paginate(10);
        // }
    	return GalleryResource::collection($gallery);
    }



    public function store(Request $request)
    {
        // return  $request->gallery_content[0]['caption'];
        $gallery = $request->isMethod('put') ? Gallery::findOrFail($request->gallery_id) : new Gallery;
        $gallery->save();
        $gal_id = $gallery->id ;
        $gallery -> title = $request->gallery['title'];
        $gallery -> cover = $request->gallery['cover'];

        foreach($request->gallery_content as $item){
            $content =  new GalleryContent;
            $content->caption = $item['caption'] ;
            $content->content = $item['content'] ;
            $content->gallery_id = $gal_id ;
            $content->save();
        }
        //vat_reg_no
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $gallery ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $gallery ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $gallery ->updated_by = $log_user->id : '' ;


        if($gallery->save()){
            return new GalleryResource($gallery);
        }
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if($gallery->delete()){
        	return new GalleryResource($gallery);
        }
    }
}
