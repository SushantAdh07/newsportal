<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class Comments extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}


