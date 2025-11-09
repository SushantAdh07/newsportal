<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sendnews;
use App\Models\User;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Support\Facades\Storage;


class SendNewsController extends Controller
{

    protected $newsRepository;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function sendNews()
    {
        return view('frontend.sendnews');
    }

    public function storeSendNews(Request $request)
    {

        $request->validate([
            'send_news_title' => 'required',
            'send_news_details' => 'required',
            'sendername' => 'required',
            'senderemail' => 'required',
            'senderimage' => 'nullable',
        ], [
            'required' => 'Field Cannot Be Empty',
        ]
    );

        $senderimagePath = null;

        if ($request->hasFile('senderimage')) {
            $senderimage = $request->file('senderimage');
            $name_gen = hexdec(uniqid()) . '.' . $senderimage->getClientOriginalExtension();
            $senderimagePath = 'uploads/news/' . $name_gen;
            Storage::disk('public')->put($senderimagePath, file_get_contents($senderimage));
        }

        Sendnews::insert([
            'send_news_title' => $request->send_news_title,
            'send_news_details' => $request->send_news_details,
            'sendername' => $request->sendername,
            'senderemail' => $request->senderemail,
            'senderimage' => $senderimagePath,

        ]);
        return redirect()->back();
    }

    public function showSentNews()
    {
        $sentnews = Sendnews::latest()->get();
        return view('admin.sentnews.sentnews', compact('sentnews'));
    }

    public function editSentNews($id)
    {
        $adminuser = User::where('role', 'admin')->latest()->get();
        $category = $this->newsRepository->getAllCat();
        $sentnews = Sendnews::findOrFail($id);
        return view('admin.sentnews.editsentnews', compact('adminuser', 'category', 'sentnews'));
    }

    public function deleteSentNews($id)
    {
        Sendnews::findOrFail($id)->delete();
        $notifications = array(
            'message' => 'Deleted',
            'alert' => 'success'
        );
        return redirect()->back()->with($notifications);
    }
}
