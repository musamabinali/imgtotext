<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogDetail;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        //$records = Blog::with('blogdetail', 'user')->get();
        $records = [];
        return view('blog', compact('records'));
    }
}
