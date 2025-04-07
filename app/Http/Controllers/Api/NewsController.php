<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request){

        $query = News::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        return response()->json($query);


        /*$news = News::get();
        if($news->count() > 0){
            return NewsResource::collection($news);
        }
        else{
            return response()->json(['message' => 'No news available']);
        } */
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
