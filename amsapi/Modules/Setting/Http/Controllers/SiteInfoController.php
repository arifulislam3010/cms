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
        // validate 
        // return Input::all();    
        // post or put 
        $site = $request->isMethod("put") ? SiteInfo::findOrfail($request->id) : new SiteInfo(Input::all()) ;
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
