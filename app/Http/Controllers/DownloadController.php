<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class DownloadController extends Controller
{
    public function download(Request $request){
        $filePath = $request->filePath;
        return response()->download(storage_path('app/uploads/'.$filePath));
    }
    public function upload(Request $request){
            /*$request->validate([
                'file'=>'required|file|mimes:doc,docx'
            ]);*/
            $hash =Str::uuid()->toString();
            $uploadedFile = $request->file('file');
            $extension = $uploadedFile->getClientOriginalExtension();
            $filename ="{$hash}.{$extension}";
            $uploadedFile->storePubliclyAs("uploads",$filename);
            return response()->json(['path' => $filename]);
    }
    public function view(Request $request){
        // dd($request->tool);
        $filePath = $request->filePath;
        $tool = $request->tool;
        return view('resultView')->with([
            'path' => storage_path('app/uploads/'.$filePath),
            'filename' => $filePath,
            'tool' => $tool,

        ]);
    }
    public function editpdf(Request $request){
         dd($request->tool);
        $filePath = $request->filePath;
        $tool = $request->tool;
        return view('edit-pdf')->with([
            'path' => storage_path('app/uploads/'.$filePath),
            'filename' => $filePath,
            'tool' => $tool,

        ]);
    }
    public function watermark(Request $request){
        $filePath = $request->filePath;
        return view('edit-pdf-watermark')->with([
            'path' => storage_path('app/uploads/'.$filePath),
            'filename' => $filePath
        ]);
    }

}
