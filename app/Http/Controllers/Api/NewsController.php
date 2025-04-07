<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request){

        $news = News::query();
    
    if ($request->has('name')) {
        $news->where('name', 'like', '%'.$request->name.'%');
    }
    
    return response()->json($news->get());
    }

    public function store(){
    }

    public function show(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
