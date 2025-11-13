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

        //category-1
        $skip_cat_0 = Category::skip(0)->first();

        $skip_news_0 = News::where('status', 1)
            ->where('category_id', optional($skip_cat_0)->id) // Safely access $skip_cat_0->id
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();


        //category-2
        $skip_cat_2 = Category::skip(0)->first();

        $skip_news_2 = News::where('status', 1)
            ->where('category_id', optional($skip_cat_2)->id) // Safely access $skip_cat_0->id
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();


        //category-3
        $skip_cat_3 = Category::skip(0)->first();

        $skip_news_3 = News::where('status', 1)
            ->where('category_id', optional($skip_cat_3)->id) // Safely access $skip_cat_0->id
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();

        //category-4
        $skip_cat_1 = Category::skip(0)->first();

        $skip_news_1 = News::where('status', 1)
            ->where('category_id', optional($skip_cat_1)->id) // Safely access $skip_cat_0->id
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();

        //api-news
        $response = Http::get('https://api.first.org/data/v1/news', [
            'limit' => 10,
        ]);

        $articles = array_map(function ($item){
            return array_merge($item, [
                'news_title'=> $item['title'],
                'news_details'=> $item['summary'],
            ]);
        }, $response->json()['data'] ?? []);

        dd($articles);

        return view('frontend.newshome', compact('news', 'category', 'skip_cat_0', 'skip_news_0', 'skip_cat_2', 'skip_news_2', 'skip_cat_3', 'skip_news_3', 'skip_cat_1', 'skip_news_1', 'articles'));
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
