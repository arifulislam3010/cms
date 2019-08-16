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
    

    /**
     * Load data on request.
     * @return Response
     */
   

    

   
    }
}
