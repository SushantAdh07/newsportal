<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request){

        try {
            $query = News::query();
            
            // Name filter
            if ($request->has('name')) {
                $query->where('name', 'like', '%' . $request->input('name') . '%');
            }
            
            // Get results with pagination
            $perPage = $request->input('per_page', 15); // Default to 15 items per page
            $news = $query->paginate($perPage);
            
            // Return structured JSON response
            return response()->json([
                'success' => true,
                'data' => $news->items(),
                'meta' => [
                    'total' => $news->total(),
                    'per_page' => $news->perPage(),
                    'current_page' => $news->currentPage(),
                    'last_page' => $news->lastPage(),
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve news',
                'error' => $e->getMessage()
            ], 500);
        }
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
