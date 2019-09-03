<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Topic;

use Modules\Setting\Transformers\Topic as TopicResource;

class TopicController extends Controller
{
    public function index(Request $request){


        // $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        // $role = Sentinel::findRoleById($role_id);
        // $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $topic = '';

        // if ($role->hasAccess(['department.view'])){
        //     $department = Department::when($search_item , function($q) use($search_item,$user_id){return $q->where('created_by',$user_id)->where('name','like',"%$search_item%");})
        //         ->when($user_id , function($q) use($user_id){return $q->where('created_by',$user_id);})
        //        ->paginate(10);
        // }
        // if ($role->hasAccess(['department.viewall'])){
          return $topic = Topic::when($search_item , function($q) use($search_item){return $q->where('name','like',"%$search_item%");})
           ->paginate(10);
        // }
    	return TopicResource::collection($topic);
    }



    public function store(Request $request)
    {

        $topic = $request->isMethod('put') ? Topic::findOrFail($request->topic_id) : new Topic;
        $topic -> title = $request->input('title');
        $topic -> cover = $request->input('cover');
        $topic -> status = $request->input('status');

        //vat_reg_no
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $topic ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $topic ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $topic ->updated_by = $log_user->id : '' ;


        if($topic->save()){
            return new TopicResource($topic);
        }
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);

        if($topic->delete()){
        	return new TopicResource($topic);
        }
    }
}
