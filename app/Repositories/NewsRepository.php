<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\News;

class NewsRepository implements NewsRepositoryInterface{
    public function getAllNews(){
        return News::latest()->get();
    }

    public function NewsById($id)
    {
        return News::findOrfail($id);
    }

    public function getAllCat(){
        return Category::latest()->get();
    }

    public function catById($id){
        return Category::findOrFail($id);
    }
}