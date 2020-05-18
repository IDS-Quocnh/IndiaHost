<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UploadImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request)
    {

        return view('upload_image.index');
    }

    public function upload(Request $request)
    {
        $operationId =  uniqid();
        $destinationPath = 'uploads';
        $file = $request->file('fileUpload');
        $fileExt=strtolower($file->getClientOriginalExtension());
        $fileId=uniqid();
        $fileName=$file->getClientOriginalName();
        $mimeType=$file->getMimeType();
        $fileExt=$file->getClientOriginalExtension();
        $fileType = $mimeType . ' (' . $fileExt . ')';
        $file->move($destinationPath . "/" . $fileId ,$fileName);
        $filePath = $destinationPath . "/" . $fileId  .'/'.$fileName;
        return redirect($filePath);
    }


}
