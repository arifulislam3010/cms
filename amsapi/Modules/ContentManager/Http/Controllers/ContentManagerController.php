<?php

namespace Modules\ContentManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller;
use Modules\ContentManager\Entities\Content;
use Illuminate\Support\Facades\Storage;
use Modules\ContentBank\Transformers\ContentBank as ContentBankResource;
use App\Models\User\InstitutionInfo;
use App\Models\Course\Course;
use DB;
use Auth;
use App\User;

class ContentManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json($_FILES);
    }

    /**
     * Load data on request.
     * @return Response
     */
    public function load_content(Request $request, $user_name, $get_req)
    {
        $filesize = isset($request['filesize'])?$request['filesize']:null;

        $user_id = Auth::id();
        $ownerusername = config('global.username');
        //$ownerusername2 = config('global.username2');
        $RouteUserName = $request->route('username');
        if(config('global.created_by')==null){
             $created_by = $user_id;
        }else{
           $created_by = null;
        }
        
        $owner = InstitutionInfo::where('username',$ownerusername)->first();
        $owner_id = $owner->id;

        // $RouteUserName = config('global.username');

        // $RouteUser = InstitutionInfo::where('username',$RouteUserName)->first();
        //return $user_id .'/'.$get_req;
        if ($get_req == 'search'){
            $contents = ContentBank::where('owner_id', $owner_id)
                        ->where('title','LIKE','%'. $request->input('keyword') .'%')
                        ->orWhere('tags','LIKE','%'. $request->input('keyword') .'%')
                        ->when($created_by, function($q) use($created_by){return $q->where('created_by', $created_by);})
                        ->orderBy('created_at', 'DESC')
                        ->paginate(6);
            //dd($contents);
        }
        elseif ($get_req == 'all') $contents = ContentBank::where('owner_id', $owner_id)
            ->when($created_by, function($q) use($created_by){return $q->where('created_by', $created_by);})
            ->orderBy('created_at', 'DESC')->paginate(6);
        elseif($get_req=='recent') $contents = ContentBank::where('owner_id', $owner_id)->when($created_by, function($q) use($created_by){return $q->where('created_by', $created_by);})->orderBy('updated_at','DESC')->paginate(6);

        elseif($get_req=='search_content'){
            $contents = ContentBank::where('owner_id', $owner_id)
            ->when($created_by, function($q) use($created_by){
                return $q->where('created_by', $created_by);
            })
            ->where('type', $request->input('get_content_type'))
            ->where('title','LIKE','%'. $request->input('keyword') .'%')
            ->orWhere('tags','LIKE','%'. $request->input('keyword') .'%')
            ->orderBy('created_at','DESC')
            ->paginate(6);
        }

        else $contents = ContentBank::where('owner_id', $owner_id)
                        ->when($created_by, function($q) use($created_by){
                            return $q->where('created_by', $created_by);
                        })
                        ->when($filesize, function($q) use($filesize){
                            return $q->where('size','<=',$filesize);
                        })
                        ->where('type', $get_req)
                        ->orderBy('created_at','DESC')
                        ->paginate(6);
        
        return ContentBankResource::collection($contents);        
    }

    /**
     * Load data on request.
     * @return Response
     */
    public function load_edit_content(Request $request, $user_name)
    {
        //return $request->input();
        $user_id = Auth::id();   
        $RouteUserName = config('global.username');

        $RouteUser = InstitutionInfo::where('username',$RouteUserName)->first();

        $contents = ContentBank::where('owner_id', $RouteUser->id)->whereIn('id', $request->input())->orderBy('created_at', 'DESC')->paginate(count($request->input()));        
        return ContentBankResource::collection($contents);
    }

    public function load_show_content($username,$id)
    {
        $content = ContentBank::find($id);
        return $content;
    }

    public function delete_content($username,$id)
    {
        $RouteUserName = config('global.username');
        $RouteUser = InstitutionInfo::where('username',$RouteUserName)->first();

        $course = Course::where('course_cb_id',$id)->orWhere('video_cb_id',$id)->count();
        $content = ContentBank::find($id);

        if($content['type'] == 'video')
            $path = public_path().'/'.config('global.storage_path').config('global.content_videos').'user-'.$RouteUser['id'].'/'.$content['file_name'];
        else if($content['type'] == 'image')
            $path = public_path().'/'.config('global.storage_path').config('global.content_images').'user-'.$RouteUser['id'].'/'.$content['file_name'];
        else if($content['type'] == 'audio')
            $path = public_path().'/'.config('global.storage_path').config('global.content_audios').'user-'.$RouteUser['id'].'/'.$content['file_name'];
        else if($content['type'] == 'document')
            $path = public_path().'/'.config('global.storage_path').config('global.content_documents').'user-'.$RouteUser['id'].'/'.$content['file_name'];
    
        
        if($content['owner_id'] == $RouteUser['id']){
            if($content['use_count']>0 || $course>0){
                $data = [
                    'status'    => 'error',
                    'code'      => '400',
                    'message'   => 'Content data is already used!',
                ];
    
                return response()->json($data, 200);
            }else{
                if($content->delete()){
                    File::delete($path);
                    $data = [
                        'status'    => 'Success',
                        'code'      => '200',
                        'message'   => 'Delete successfully',
                    ];
    
                    return response()->json($data, 200);
                }else{
                    $data = [
                        'status'    => 'error',
                        'code'      => '404',
                        'message'   => 'Delete failed!',
                    ];
    
                    return response()->json($data, 404);
                }
            }
        }else{
            $data = [
                'status'    => 'error',
                'code'      => '404',
                'message'   => 'User not access that content!',
            ];

            return response()->json($data, 404);
        }
        

    }
}
