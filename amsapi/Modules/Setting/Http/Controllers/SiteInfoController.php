<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

use Modules\Setting\Entities\SiteInfo;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return SiteInfo::all();
    }

 
    public function store(Request $request)
    {
        // return $request->method();
        // validate 
        // return Input::all();    
        // post or put 
        $site = $request->isMethod("post") ?   new SiteInfo(Input::all()) : SiteInfo::findOrfail($request->id);
        if($request->isMethod("put")){
            $site->update(Input::all());
        }
        if($site->save()){
            return $site ;
        }

    }



    public function destroy($id)
    {
        $site = SiteInfo::findOrfail($id) ;
        if($site->delete()){
            return $site ;
        }
    }
}
