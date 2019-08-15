<?php

namespace Modules\ContentManager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class UploadContentController extends Controller
{
    private $image_ext = ['jpg','jpeg' ,'png' ,'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg', 'avi', 'mov', 'mpeg-4', 'wmv', 'mpeg-ps', 'flv', '3gpp', 'webm'];
    private $document_ext = ['doc', 'docx', 'pdf', 'pptx', 'ppt', 'xls', 'xlsx'];

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json($_FILES);
    }

    /**
     * Submit a set of data
     * @return Response
     */
    public function update(Request $request)
    {        
        if(!empty($request->input())){
            
            $contentBank = new ContentBank();
            
            $QryFieldStr = '(';
            $QryValueStr = '';
            $QryDupUpdtStr = '';            
            
            $i=0; foreach($request->input() as $index => $data){            
                
                $co=0; if($i++>0) $QryValueStr .= ',';
                $QryValueStr .= '(';
                
                foreach($data as $field => $value){
                    if($value==null) continue;
                    if($co++>0){
                        if($i == 1){
                            $QryFieldStr .= ',';                    
                            $QryDupUpdtStr .= ',';
                        }
                        $QryValueStr .= ',';
                    }
                    if($i==1){
                        $QryFieldStr .= $field;
                        $QryDupUpdtStr .= $field . ' = VALUES(' . $field . ')';
                    }
                    $QryValueStr .= (is_numeric($value)?$value:'"'.$value.'"');
                }

                $QryValueStr .= ')';            
            }        
            
            $QryFieldStr .= ')';
            
            $QryStr = 'INSERT INTO ' . $contentBank->getTable() . $QryFieldStr . ' VALUES' . $QryValueStr . '
                        ON DUPLICATE KEY UPDATE ' . $QryDupUpdtStr;
            
            //return $QryStr;
            if(DB::statement($QryStr)) return '1';
            else return '0';

        }else return '0';
    }

    /**
     * Chunk files
     * @return Response
     */
    public function chunk(Request $request)
    {
        // return $request->all();
        // return $request->file('file');
        $file   = $request->file('file');
        $name   = $file->getClientOriginalName();
        $type   = $request['file_type'];

        if ($type === 'image') $base_path = config('global.content_images');
        elseif ($type === 'audio') $base_path = config('global.content_audios');
        elseif ($type === 'video') $base_path = config('global.content_videos');
        else $base_path = config('global.content_documents');

        // Got authenticate user id
        $user_id = Auth::id();
        $RouteUserName = config('global.username');

        $RouteUser = InstitutionInfo::where('username',$RouteUserName)->first();

        $file_name_setup = $user_id.'-blob-'.$request['file_index'].'-'.$request['num'];
        $file_name_for_save = $file_name_setup;

        if(Storage::disk('public')->putFileAs( $base_path . 'user-'.$RouteUser->id . '/chunk_files', $file, $file_name_for_save )){
            return '1';
        }else{
            return '0';
        }
    }

    /**
     * Chunk file marge
     * @return Response
     */
    public function chunk_merge(Request $request)
    {
        $num_chunks = $request['num_chunks'];
        $type = $request['file_type'];

        if ($type === 'image') $base_path = config('global.content_images');
        elseif ($type === 'audio') $base_path = config('global.content_audios');
        elseif ($type === 'video') $base_path = config('global.content_videos');
        else $base_path = config('global.content_documents');

        // Got authenticate user id
        $user_id = Auth::id();
        $RouteUserName = config('global.username');

        $RouteUser = InstitutionInfo::where('username',$RouteUserName)->first();

        $target_file = $base_path . $user_id.'-blob-'.$request['file_index'];
        //$file_name_for_save = $file_name_setup;

        // count ammount of uploaded chunks
        $chunksUploaded = 0;
        for ( $i = 1; $i <= $num_chunks; $i++ ) {
            if ( file_exists( $target_file.'-'.$i ) ) {
                ++$chunksUploaded;
            }
        }
        return $chunksUploaded.'/'.$num_chunks;
        // and THAT's what you were asking for
        // when this triggers - that means your chunks are uploaded
        if ($chunksUploaded == $num_chunks) {
            echo '<br>Full';
            /* here you can reassemble chunks together */
            for ($i = 1; $i <= $num_chunks; $i++) {
        
            $file = fopen($target_file.$i, 'rb');
            $buff = fread($file, 2097152);
            fclose($file);
        
            $final = fopen($target_file.'.'.$ext, 'ab');
            $write = fwrite($final, $buff);
            fclose($final);
        
            unlink($target_file.$i);
            }
        } 
    }

    /**
     * Store upload files
     * @return Response
     */
    public function store(Request $request)
    {
        //return $request->file('file')->getClientOriginalExtension();
        //return response()->json($request->file());

        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        $request->validate([
            //'name' => 'required|unique:file',
            //'file' => 'required|file|mimes:' . strtolower($all_ext)
        ]);        

        $file   = $request->file('file');
        $name   = $file->getClientOriginalName();
        $size   = $file->getClientSize();
        $ext    = strtolower($file->getClientOriginalExtension());
        $type   = $this->getType($ext);
        
        if ($type == 'image') $base_path = config('global.content_images');
        elseif ($type == 'audio') $base_path = config('global.content_audios');
        elseif ($type == 'video') $base_path = config('global.content_videos');
        else $base_path = config('global.content_documents');
        
        // Got authenticate user id
        $user_id = Auth::id();
        $RouteUserName = config('global.username');

        $RouteUser = InstitutionInfo::where('username',$RouteUserName)->first();

        $file_name_setup = $type . '-' . $user_id . '-' . time();
        $file_name_for_save = $file_name_setup . '.' . $ext;

        $contentBank = new ContentBank();

        // $command = 'ffmpeg -i '.$file.' -vf scale=200:400,setsar=1:1 '.$base_path . 'user-'.$RouteUser->id . '/video_200x400.mp4 -hide_banner';
        // exec($command);
        // die();

        if (Storage::disk('public')->putFileAs( $base_path . 'user-'.$RouteUser->id . '/', $file, $file_name_for_save )) {
            // $command = 'ffmpeg -i '.$file.' -vf scale=200:400,setsar=1:1 '.$base_path . 'user-'.$RouteUser->id . '/video_200x400.mp4 -hide_banner';
            // exec($command);

            $contentBank->title = pathinfo($name, PATHINFO_FILENAME);
            $contentBank->type = $type;
            $contentBank->content_id = $user_id . time();
            $contentBank->file_name = $file_name_for_save;
            $contentBank->file_encode_path = base64_encode('user-'.$RouteUser->id . '/' . $file_name_setup) . '.' . $ext;
            $contentBank->size = $size/1024;
            $contentBank->owner_id = $RouteUser->id;
            $contentBank->created_by = $user_id;
            $contentBank->updated_by = $user_id;
            $contentBank->created_at = date('Y-m-d H:i:s');
            $contentBank->save();
            return new contentBankResource($contentBank);
            // return $contentBank::create([
            //     'title' => $name,
            //     'type' => $type,
            //     'file_name' => $file_name_for_save,
            //     'owner_id' => $user_id,
            //     'created_by' => $user_id,
            //     'updated_by' => $user_id
            // ]);
        }        
    }
    
    /**
     * Assignment upload block
     */
    public function assignmentUpload(Request $request){
        return $request->all();
    }

    /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }

    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    private function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    private function getUserDir()
    {
        $user = InstitutionInfo::where('user_id' , Auth::id())->first()->id;
        return 'user-' . $user;
    }
}
