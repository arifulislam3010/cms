<?php

namespace Modules\ContentManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\File;
use Modules\ContentManager\Entities\Content;
use Illuminate\Support\Facades\Storage;
use Modules\ContentBank\Transformers\ContentBank as ContentBankResource;
use DB;
use Auth;
use App\User;
use App\Lib\FileUpload;
class ContentManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $Content = Content::all();
        return $Content ;
        // return ContentBankResource::collection($Content);
    }

    /**
     * Load data on request.
     * @return Response
     */
    

    /**
     * Load data on request.
     * @return Response
     */
   
    public function store(Request $request){
		
    	$validator = $request->validate([
    		'file'     => 'required',
    		'title'    => 'required',
    	]);
    	
    	$Content =  new Content ;


        if ($request->hasFile('file'))
        {
            $file           = $request->file('file');
            $prefix         = 'file';
            $path           = 'uploads/';

            $file_upload = new FileUpload;
            $upload = $file_upload->upload($file, $prefix, $path);
            $file = $upload['file_name'];
            $type = $upload['type'];
            
        }
        else
        {
            
            $file = $request->input('file');
            $type = $request->input('type');
        }

        $Content->name = $file;
    	$Content->title = $request['title'];
    	$Content->type  = $type; 

        $log_user = Auth()->user();
        $request->isMethod('put') ?  $Content->updated_by = $log_user->id : '' ;
        $request->isMethod('post') ? $Content->created_at = $log_user->id : '' ;
        $request->isMethod('post') ? $Content->updated_at = $log_user->id : '' ;

        if($Content->save()){
        	return new ContentBankResource($Content);
        }else{
            return response()->json(['errors' =>['message'=>'No Data']],400);
        }	
	}

	public function delFile($id){
		$doc = plot_info_file::findOrFail($id);
        $path           = 'uploads/PLOT_INFO_DOCUMENT/';
        $file = $doc->name;
        $file_upload = new FileUpload;
        $upload = $file_upload->remove($file,$path);
		if($doc->delete()){
			return $doc ;
		}
	}
    
}
