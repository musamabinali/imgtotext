<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    function pdfmerge(Request $request){
//        if($request)


            shell_exec('pdfunite /home/adeel/Desktop/a.pdf /home/adeel/Desktop/b.pdf /home/adeel/Desktop/result.pdf');

    }
}
