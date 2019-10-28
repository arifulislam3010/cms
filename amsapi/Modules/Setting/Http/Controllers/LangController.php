<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Language;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return Language::all();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // return $request->title;
        // validate 
        $validatro = $request->validate([
            'title' => 'required',
            'slug' => 'required',
        ]);
        // post or put !
        // add or update !
        $lang = $request->isMethod('put')? Language::findOrfial($request->id) : new Language ;
        $lang->title  = $request->title;
        $lang->slug  = $request->slug;
        $lang->admin_field  = $request->admin_field;
        $lang->frontend_field  = $request->frontend_field;

        // who did this ? (create/ update)
        $user_id = Auth()->user()->id ;
        if($request->isMethod('post')){ // create 
            $lang->created_by = $user_id ;
        }else{
            $lang->updated_by = $user_id ;
        }
        if($lang->save()){
            return $lang ;
        }

    }


    public function destroy($id)
    {
        $lang = Language::findOrfail($id) ;

        if($lang->delete()){
            return $lang ;
        }
    }
}
