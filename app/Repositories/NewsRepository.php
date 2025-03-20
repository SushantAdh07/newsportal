<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository implements NewsRepositoryInterface{
    public function getAllNews(){
        return News::latest()->get();
    }

    public function NewsById($id)
    {
        return News::findOrfail($id);
    }
}