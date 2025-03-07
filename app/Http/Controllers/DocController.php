<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Conversion;
use Illuminate\Support\Facades\Http;
use Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use ZipArchive;
use \File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocController extends Controller
{
    public function doc(Request $request)
    {
        if ($request){

            foreach ($request->paths as $path){
                $hash = str_replace('.docx','.pdf',$path);
                $hash = str_replace('.doc','.pdf',$hash);
                $path = storage_path('app/uploads/'.$path);
                $str = "export HOME=/tmp && soffice --headless --convert-to pdf $path --outdir ".storage_path('app/uploads/');
                shell_exec($str);
                return response()->json(['path' => $hash]);

            }

        }
    }
    function xls(Request $request)
    {
        if ($request){

            foreach ($request->paths as $path){
                $hash=str_replace('.xlsx','.pdf',$path);
                $hash=str_replace('.xls','.pdf',$hash);
                $path=storage_path('app/uploads/'.$path);
                $str="export HOME=/tmp && soffice --headless --convert-to pdf $path --outdir ".storage_path('app/uploads/');
                $test=shell_exec($str);
                return response()->json(['path' => $hash]);

            }

        }
//
    }
    function ppt(Request $request)
    {
        if ($request){

            foreach ($request->paths as $path){
                $hash=str_replace('.pptx','.pdf',$path);
                $hash=str_replace('.ppt','.pdf',$hash);
                $path=storage_path('app/uploads/'.$path);
                $str="export HOME=/tmp && soffice --headless --convert-to pdf $path --outdir ".storage_path('app/uploads/');
                $test=shell_exec($str);
                return response()->json(['path' => $hash]);

            }

        }
//
    }
    function img(Request $request)
    {
        try {
            $file_paths = array_map(function ($name) {
                return storage_path('app/uploads/'.$name);
            },$request->paths);
            $hash = Str::uuid()->toString();
            $str = "export HOME=/tmp && convert ".implode(" ",$file_paths)." ".storage_path('app/uploads/'.$hash.'.pdf');
            shell_exec($str);
            return response()->json(['path' => $hash.'.pdf']);
        }catch (Exception  $e){
            echo $e;
        }
    }
    function pdf_to_png(Request $request)
    {

        try {
            $file_paths = array_map(function ($name) {
                return storage_path('app/uploads/'.$name);
            },$request->paths);
            $hash = Str::uuid()->toString();
            $str = "export HOME=/tmp && convert  ".implode(" ",$file_paths)."  ".storage_path('app/uploads/'.$hash.'.png');
            shell_exec($str);
            $filesGenerated = File::glob(storage_path('app/uploads/'.$hash.'*.png'));
            $fileName = $hash;
            if(count($filesGenerated) > 1){
                $zip = new ZipArchive;
                $fileName = $fileName.'.zip';
                if ($zip->open(storage_path('app/uploads/'.$fileName), ZipArchive::CREATE) === TRUE) {
                    foreach (File::glob(storage_path('app/uploads/'.$hash.'*.png')) as $patternfile){
                        $zip->addFile($patternfile, basename($patternfile));
                    }
                }
                $zip->close();
            }else{
                $fileName = $fileName.'.png';
            }

            return response()->json(['path' => $fileName]);
        }
        catch (Exception  $e){
            echo $e;
        }
//
    }
    function pdf_to_jpg(Request $request)
    {
        try {
            $file_paths = array_map(function ($name) {
                return storage_path('app/uploads/'.$name);
            },$request->paths);
            $hash = Str::uuid()->toString();
            $str = "export HOME=/tmp && convert ".implode(" ",$file_paths)."  ".storage_path('app/uploads/'.$hash.'.jpg');

            shell_exec($str);

            $filesGenerated = File::glob(storage_path('app/uploads/'.$hash.'*.jpg'));

            $fileName = $hash;
            if(count($filesGenerated) > 1){

                $zip = new ZipArchive;
                $fileName = $fileName.'.zip';
                if ($zip->open(storage_path('app/uploads/'.$fileName), ZipArchive::CREATE) === TRUE) {
                    foreach (File::glob(storage_path('app/uploads/'.$hash.'*.jpg')) as $patternfile){
                        $zip->addFile($patternfile, basename($patternfile));
                    }
                }
                $zip->close();
            }else{
                $fileName = $fileName.'.jpg';
            }

            return response()->json(['path' => $fileName]);
        }
        catch (Exception  $e){
            echo $e;
        }
//
    }
    function htmlToPdf(Request $request){
//        dd($request);
        if($request->paths) {
            try {
                $file_paths = array_map(function ($name) {
                    return storage_path('app/uploads/' . $name);
                }, $request->paths);

                $hash = Str::uuid()->toString();
                // $str = "export HOME=/tmp && convert -flatten ".implode(" ",$file_paths)."  ".storage_path('app/uploads/'.$hash.'.png');
                $str = "export HOME=/tmp && wkhtmltopdf file://" . implode(' ', $file_paths) . " " . storage_path('app/uploads/' . $hash . '.pdf');
//            dd($str);
                shell_exec($str);
                // $filesGenerated = Fi:le:glob(storage_path('app/uploads/'.$hash.'*.png'));
                $fileName = $hash . '.pdf';
                return response()->json(['path' => $fileName]);
            } catch (Exception  $e) {
                echo $e;
            }

        }
        elseif ($request->myurl){
            try {
                $file_paths = $request->myurl;

                $hash = Str::uuid()->toString();
                // $str = "export HOME=/tmp && convert -flatten ".implode(" ",$file_paths)."  ".storage_path('app/uploads/'.$hash.'.png');
                $str = "export HOME=/tmp && wkhtmltopdf " . $file_paths . " " . storage_path('app/uploads/' . $hash . '.pdf');
//            dd($str);
                shell_exec($str);
                // $filesGenerated = Fi:le:glob(storage_path('app/uploads/'.$hash.'*.png'));
                $fileName = $hash . '.pdf';
                return response()->json(['path' => $fileName]);
            } catch (Exception  $e) {
                echo $e;
            }
        }
    }
    function pdf_to_ppt(Request $request){

        foreach ($request->paths as $path){
            $hash = str_replace('.pdf','.pptx',$path);
            $path =storage_path('app/uploads/'.$path);

            $str='export HOME=/tmp && pdf2pptx '.$path;
            shell_exec($str);
            return response()->json(['path'=>$hash]);
        }


    }
    function pdf_to_xls(Request $request){

        foreach ($request->paths as $path){
            $hash = str_replace('.pdf','.xlsx',$path);
            $path =storage_path('app/uploads/'.$path);

            $str='export HOME=/tmp && pdf2pptx '.$path;
            shell_exec($str);
            return response()->json(['path'=>$hash]);
        }


    }
    function pdf_rotate(Request $request){

        foreach ($request->paths as $path){
            $hash = 'rotate_'.$path;
            $path_ =storage_path('app/uploads/rotate_'.$path);
            $path =storage_path('app/uploads/'.$path);

            $str='export HOME=/tmp && pdftk '.$path.' cat 1-endeast output '.$path_;
            shell_exec($str);
            return response()->json(['path'=>$hash]);
        }


    }

    function split(Request $request)
    {

        try {
            $path = $request->paths[0];
            $hash = Str::uuid()->toString();
            $str = "export HOME=/tmp && pdftk ".$path." burst output ".storage_path('app/uploads/'.$hash.'_%02d.pdf')." compress";
            shell_exec($str);
            $filesGenerated = File::glob(storage_path('app/uploads/'.$hash.'*.pdf'));
            $fileName = $hash;
            if(count($filesGenerated) > 1){
                $zip = new ZipArchive;
                $fileName = $fileName.'.zip';
                if ($zip->open(storage_path('app/uploads/'.$fileName), ZipArchive::CREATE) === TRUE) {
                    foreach (File::glob(storage_path('app/uploads/'.$hash.'*.png')) as $patternfile){
                        $zip->addFile($patternfile, basename($patternfile));
                    }
                }
                $zip->close();
            }

            return response()->json(['path' => $fileName]);
        }
        catch (Exception  $e){
            echo $e;
        }
//
    }

    function watermark(Request $request)
    {

        try {
            $path = $request->paths[0];
            $hash = Str::uuid()->toString();
            $str = "export HOME=/tmp && pdftk ".$path." burst output ".storage_path('app/uploads/'.$hash.'_%02d.pdf')." compress";
            shell_exec($str);
            $filesGenerated = File::glob(storage_path('app/uploads/'.$hash.'*.pdf'));
            $fileName = $hash;
            if(count($filesGenerated) > 1){
                $zip = new ZipArchive;
                $fileName = $fileName.'.zip';
                if ($zip->open(storage_path('app/uploads/'.$fileName), ZipArchive::CREATE) === TRUE) {
                    foreach (File::glob(storage_path('app/uploads/'.$hash.'*.png')) as $patternfile){
                        $zip->addFile($patternfile, basename($patternfile));
                    }
                }
                $zip->close();
            }

            return response()->json(['path' => $fileName]);
        }
        catch (Exception  $e){
            echo $e;
        }
//
    }
    function pdftodoc(Request $request){
        try {

            if ($request){
                foreach ($request->paths as $path){
                    $hash = str_replace('.pdf','.docx',$path);
                    $path =storage_path('app/uploads/'.$path);
                    $str="export HOME=/tmp && lowriter --invisible --infilter='writer_pdf_import' --convert-to docx $path --outdir ".storage_path('app/uploads/');
                    shell_exec($str);

                    return response()->json(['path'=>$hash]);
                }
            }
        }catch (Exception  $e){
            echo $e;
        }
    }
    function merge_pdf(Request $request){
        if($request){

            try {
                $file_paths = array_map(function ($name) {
                    return storage_path('app/uploads/'.$name);
                },$request->paths);
                $hash = Str::uuid()->toString();
                $str = "export HOME=/tmp && pdfunite ".implode(" ",$file_paths)." ".storage_path('app/uploads/'.$hash.'.pdf');
                //    dd($str);
                shell_exec($str);
                return response()->json(['path' => $hash.'.pdf']);
            }catch (Exception  $e){
                echo $e;
            }
        }
    }
    function compresspdf(Request $request)
    {
        if ($request) {
            $file_paths = array_map(function ($name) {
                return storage_path('app/uploads/' . $name);
            }, $request->paths);
            $hash = Str::uuid()->toString();
            $path = $file_paths[0];

            $inputfilewithpath = implode(" ", $file_paths);
            $outputfilewithpath = storage_path('app/uploads/' . $hash . '.pdf');
            $str = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -dNOPAUSE -dQUIET -dBATCH -sOutputFile=$outputfilewithpath $inputfilewithpath";
            shell_exec($str);
            return response()->json(['path' => $hash . '.pdf']);
        }
    }

    function handleOCR(Request $request){
        $request->validate([
            //'file.*' => 'required|image|mimes:jpeg,png,jpg,gif,jif,jfif,jfi,bmp,tiff|max:16384',
            'images' => 'required|image|max:16384',
        ],[
            'images.required' => 'You have to choose the file!',
            'images.max' => 'Please choose file not greater than 15 MB',
            'images.mimes' => 'Please choose valida image .jpg, jpeg, .png and etc.'
        ]);
        if($request)
            $hash = Str::uuid()->toString();
        $uploadedFile = request()->file('images');
        $uploadedFile = $uploadedFile;
        $extension = $uploadedFile->getClientOriginalExtension();
        $filename = "{$hash}.{$extension}";
        $uploadedFile->storePubliclyAs("public/uploads", $filename);
        // Storage::disk('public')->putFileAs('uploads', request()->file('file'), $filename);
        $filePath = 'app/public/uploads/' . $filename;
        $language1 = request()->input("language");


        /**
         * Check/Get if cache exist for urls array
         *      Set if cache doesn't exist from admin panel/.env
         * Get array index -> values and check
         *      If failed change index of the value to end of the array
         *          Reset cache array to new values
         */
        $configArray = [
            config('app.IMAGE_API_URL'),
            config('app.IMAGE_API_URL_2'),
            config('app.IMAGE_API_URL_3'),
            config('app.IMAGE_API_URL_4'),
            config('app.IMAGE_API_URL_5'),
            config('app.IMAGE_API_URL_6')
        ];
        if (is_null($converterEndpointsLastIndex = cache('converterEndpointsLastIndex'))){
            cache(['converterEndpointsLastIndex' => 0]);
        }else{

            if(count($configArray) -1 == $converterEndpointsLastIndex){
                cache(['converterEndpointsLastIndex' => 0]);
            }else{
                $converterEndpointsLastIndex = $converterEndpointsLastIndex+1;
                //dd($converterEndpointsLastIndex);
                cache(['converterEndpointsLastIndex' => $converterEndpointsLastIndex]);
            }
        }
        if (is_null($converterEndpoints = cache('converterEndpoints'))){
            $converterEndpoints = $configArray;
            cache(['converterEndpoints' => $configArray]);
        }

        //$url = 'https://www.jpgtotext.com/img/how-to-delete-a-page-in-word.jpg';
        $url = asset('storage/uploads/'.$filename);
        $text = $this->aiScanSingle($configArray[$converterEndpointsLastIndex].$url);
        unlink(storage_path('app/public/uploads/' .$filename));


        try {
            $Conversions = new Conversion();
            $Conversions->path = $filename;
            $Conversions->result = $text;
            $Conversions->language = $language1;
            $Conversions->user_id = auth()->check()?auth()->id():null;
            $Conversions->ip = $this->getIp();
            $Conversions->save();
        } catch (\Exception $e) {

        }
        return Response::json(['text' => trim(trim($text,"\f\n"))],200);
    }
    public function aiScanSingle($image_api_url) {

        $call = $image_api_url;
        $response_url_1 = Http::get($call);
        $response_data = '';
        if ($response_url_1->successful()) {
            $response_data = $response_url_1->json();
        }
        return $response_data;
        $client = new Client();
        $promises = $client->getAsync($image_api_url)->wait();
        $response_data = $promises->getBody()->getContents();
        $response_data = json_decode($response_data);
        return $response_data;
    }
}
