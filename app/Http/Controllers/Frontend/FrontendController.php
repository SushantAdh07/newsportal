<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Models\Comments;
use DateTime;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Jorenvh\Share\ShareFacade as Share;


class FrontendController extends Controller
{
    public function home()
    {
        $category = Category::latest()->get();
        $news = News::latest()->get();

        $categories = Category::get()->keyBy('category_slug')
            ->each(function ($category) {
                $category->news = $category->news()
                    ->where('status', 1)
                    ->latest()
                    ->take(5)
                    ->get();
            });

        return view('frontend.newshome', compact('news', 'category', 'categories'));
    }



    public function CatWiseNews($id)
    {
        $category = Category::findOrFail($id);
        $news = News::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.categorypage', compact('news', 'category'));
    }


    public function Details($id)
    {


        $news = News::with('category')->findOrFail($id);
        $user = $news->user;

        $views = 'blog' . $news->id;
        if (!Session::has($views)) {
            $news->increment('view_count');
            Session::put($views, 1);
        }

        $related_cat_id = $news->category_id;
        $related_news = News::where('category_id', $related_cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(6)->get();
        $comments = Comments::where('status', '1')->get();
        $domain = 'https://apanga-aawaz.org.np';
        $shareUrl = $domain . '/news-details/' . $news->id;


        return view('frontend.newsdetails', compact('news', 'user', 'related_news', 'shareUrl'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = News::where('news_title', 'like', "%$search%")->get();

        return view('frontend.searchnews', ['results' => $results]);
    }


    public function searchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $dateFormat = $date->format('Y-m-d');
        $news = News::whereDate('post_date', $dateFormat)->latest()->get();
        return view('frontend.searchbydate', compact('news', 'dateFormat'));
    }
}
