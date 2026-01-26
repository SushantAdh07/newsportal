<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsService
{
    public function store(Request $request): News
    {
        $imagePath = $this->uploadImage($request->file('image'));

        return News::create([
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => Str::slug($request->news_title),
            'news_details' => $request->news_details,
            'tags' => $request->tags,
            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_three' => $request->first_three,
            'first_nine' => $request->first_nine,
            'post_date' => now(),
            'post_month' => now()->format('F'),
            'image' => $imagePath,
        ]);
    }

    private function uploadImage($image): string
    {
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
        $path = 'uploads/news/' . $fileName;

        Storage::disk('public')->put($path, file_get_contents($image));

        return $path;
    }
}
