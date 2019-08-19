<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Area;

use Modules\Setting\Transformers\Area as AreaResource;
class AreaController extends Controller
{
    public function index(Request $request){


        // $role_id = RoleUser::where('user_id',$user_id)->first()->role_id;
        // $role = Sentinel::findRoleById($role_id);
        // $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $search_item = ($request->has('search_item'))?$request['search_item']:null;
        $area = '';

        // if ($role->hasAccess(['department.view'])){
        //     $department = Department::when($search_item , function($q) use($search_item,$user_id){return $q->where('created_by',$user_id)->where('name','like',"%$search_item%");})
        //         ->when($user_id , function($q) use($user_id){return $q->where('created_by',$user_id);})
        //        ->paginate(10);
        // }
        // if ($role->hasAccess(['department.viewall'])){
             $area = Area::whereNull('parent_id')->paginate(10);
        // }
    	return AreaResource::collection($area);
    }



    public function store(Request $request)
    {

        $area = $request->isMethod('put') ? Area::findOrFail($request->area_id) : new Area;
        $area -> title = $request->input('title');
        $area -> parent_id = $request->input('parent_id');

        //vat_reg_no
        $log_user = Auth()->user();
        $request->isMethod('put') ?  $area ->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $area ->created_by = $log_user->id : '' ;
        $request->isMethod('post') ? $area ->updated_by = $log_user->id : '' ;


        if($area->save()){
            return new AreaResource($area);
        }
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);

        if($area->delete()){
        	return new AreaResource($area);
        }
    }
}
