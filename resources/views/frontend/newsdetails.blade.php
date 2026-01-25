@php
    $latestNews = App\Models\News::orderBy('created_at', 'DESC')->limit(5)->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="title" content="{{ $news->news_title }}" />
    <meta property="og:image" content="{{ asset('uploads/news/' . $news->image) }}" />
    <title>{{ $news->news_title }}</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/headstyle.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Ek Mukta' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">




    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel="stylesheet" id="wp-block-library-css" href="{{ asset('frontend/assets/css/style.min.css') }}"
        media="all">
    <link rel="stylesheet" id="contact-form-7-css" href="{{ asset('frontend/assets/css/style.min.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-style-css" href="{{ asset('frontend/assets/css/style.css') }}" media="all">
    <link rel="stylesheet" id="common-themesbazar-css" href="{{ asset('frontend/assets/css/common-themesbazar.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-lineawesome-css" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-stellarnav-css" href="{{ asset('frontend/assets/css/stellarnav.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-jquery-css" href="{{ asset('frontend/assets/css/jquery-ui.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-magnific-css" href="{{ asset('frontend/assets/css/magnific-popup.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-carousel-css" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-responsive-css" href="{{ asset('frontend/assets/css/responsive.css') }}"
        media="all">
    <link rel="stylesheet" id="newsflash-bootstrap-css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}"
        media="all">

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <script charset="utf-8" src=" {{ asset('frontend/assets/js/horizon_timeline.08c300ab95020b1109a05214ccb84dea.js') }}">
    </script>
</head>

<body>
    {{ View::make('frontend.body.header') }}
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <div class="single-add">
                </div>

                <div class="single-cat-info">
                    <div class="single-home">
                        <i class="la la-home"> </i><a href=" "> HOME </a>
                    </div>
                    <div class="single-cats">
                        <i class="la la-bars"></i> <a href=" " rel="category tag">{{ $news->category_name }}</a>
                    </div>
                </div>

                <h1 class="single-page-title">{{ $news->news_title }}</h1>
                <div class="row g-2">

                    <div class="col-lg-11 col-md-10">
                        <div class="reportar-title">
                            {{ $user->name }}
                        </div>
                        <div class="viwe-count">
                            <ul>
                                <li><i class="la la-clock-o"></i> Updated
                                    {{ $news->created_at }}
                                </li>
                                <li>
                                    @if (auth()->check() && auth()->user()->role === 'admin')
                                        <i class="la la-eye">{{ $news->view_count }}</i>
                                    @endif



                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="single-page-add2">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="{{ asset($news->image) }}" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div class="single-details">
                    <p>{{ $news->news_details }}</p>
                </div>
                <div class="singlePage2-tag">
                    <span> Tags : </span>
                    <a href=" " rel="tag">{{ $news->tags }}</a>
                </div>

                <div class="single-add">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="single-social-title">
                    Share News </h3>
                <div class="single-page-social">


                    <a id="shareBtn" href="https://www.facebook.com/sharer/sharer.php?u={{ url('news-details/' . $news->id) }}" target="_blank" title="Facebook"><i
                            class="lab la-facebook-f"></i>
                        {{-- <script>
                            document.getElementById('shareBtn').addEventListener('click', function() {
                                var shareUrl = encodeURIComponent("{{ $shareUrl }}");
                                var facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + shareUrl;
                                window.open(facebookShareUrl, 'facebook-share-dialog', 'width=800,height=600');
                                return false;
                            });
                        </script> --}}
                    </a>
                </div>
                @php
                    $comments = App\Models\Comments::where('news_id', $news->id)->latest()->get();
                @endphp

                <hr>

                <form action="{{ route('store.comments') }}" method="POST" class="wpcf7-form init"
                    enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                    @csrf

                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                    <div style="display: none;">

                    </div>
                    <div class="main_section">

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="contact-title">
                                    Name *
                                </div>
                                <div class="contact-form">
                                    <span class="wpcf7-form-control-wrap your-name"><input type="text"
                                            name="commentator" value="" size="40"
                                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                            aria-required="true" required aria-invalid="false"
                                            placeholder="Your Name"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="contact-title">
                                    Comments *
                                </div>
                                <div class="contact-form">
                                    <span class="wpcf7-form-control-wrap news_details">
                                        <textarea name="comments" cols="20" rows="5"
                                            class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" required aria-required="true"
                                            aria-invalid="false" placeholder="News Details...."></textarea>
                                    </span>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-btn">
                                <input type="submit" value="Submit Comments"
                                    class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                    class="wpcf7-spinner"></span>
                            </div>
                        </div>
                    </div>


                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
                <div class="container mt-3">
                    @if (session()->has('message'))
                        <div class="alert alert-success p-5">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $item)
                            <li class="list-group-item list-group-item-danger">{{ $item }}</li>
                        @endforeach
                    </div>
                @endif

                @if ($comments->count() > 0)
                    <div class="author2">
                        <div class="author-content2">
                            <h6 class="author-caption2">
                                <span> COMMENTS </span>
                            </h6>
                            @foreach ($comments as $key => $item)
                                <hr>


                                <div class="authorContent">
                                    <h5 class="card-title">
                                        <strong>{{ $key + 1 }}.
                                            {{ $item->commentator }}</strong>
                                        <h6 class="card-subtitle text-muted">{{ $item->created_at }}</h6>
                                    </h5>

                                    <div class="author-details">
                                        <p>{{ $item->comments }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                @endif



                <div class="single_relatedCat">
                    <a href=" ">Related News</a>
                </div>
                <div class="row">
                    @foreach ($related_news as $item)
                        <div class="themesBazar-3 themesBazar-m2">
                            <div class="related-wrpp">
                                <div class="related-image">
                                    <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                </div>
                                <h4 class="related-title">
                                    <a href=" ">{{ $item->news_title }} </a>
                                </h4>
                                <div class="related-meta">
                                    <a href=" "><i class="la la-tags"> </i>
                                        Saturday, 10th September 2022
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="sitebar-fixd" style="position: sticky; top: 0;">
                    <div class="siteber-add">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                        src="assets/images/biggapon-1.gif" alt="" width="100%"
                                        height="auto">
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="singlePopular">

                        <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" data-bs-toggle="pill"
                                    data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent"
                                    aria-selected="true"> LATEST </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular"
                                    role="tab" aria-controls="archivePopulars" aria-selected="false"> POPULAR
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContentarchive">
                        <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel"
                            aria-labelledby="archiveRecent">

                            <div class="archiveTab-sibearNews">

                                @foreach ($latestNews as $item)
                                    <div class="archive-tabWrpp archiveTab-border">

                                        <div class="archiveTab-image ">
                                            <a href=" "><img class="lazyload"
                                                    src="{{ asset($item->image) }}"></a>
                                        </div>
                                        <a href=" " class="archiveTab-icon2"><i class="la la-play"></i></a>
                                        <h4 class="archiveTab_hadding"><a
                                                href="{{ route('details', $item->id) }} ">{{ $item->news_title }}
                                            </a>
                                        </h4>
                                        <div class="archive-conut">
                                            1
                                        </div>


                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel"
                            aria-labelledby="archivePopulars">
                            <div class="archiveTab-sibearNews">
                                @php

                                    $news = App\Models\News::orderBy('view_count', 'DESC')->limit(4)->get();
                                @endphp




                                @foreach ($news as $item)
                                    <div class="archive-tabWrpp archiveTab-border">
                                        <div class="archiveTab-image ">
                                            <a href=" "><img class="lazyload"
                                                    src={{ asset($item->image) }}></a>
                                        </div>
                                        <a href=" " class="archiveTab-icon2"><i class="la la-play"></i></a>
                                        <h4 class="archiveTab_hadding"><a href=" ">{{ $item->news_title }}</a>
                                        </h4>
                                        <div class="archive-conut">
                                            {{ $item->view_count }}
                                        </div>

                                    </div>
                                @endforeach




                            </div>
                        </div>
                    </div>
                    <div class="siteber-add2">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ View::make('frontend.body.footer') }}
    <script src="{{ asset('backend/assets/regenerator-runtime.min.js') }}" id="regenerator-runtime-js"></script>
    <script src="{{ asset('backend/assets/wp-polyfill.min.js') }}" id="wp-polyfill-js"></script>


    <script src="{{ asset('frontend/assets/js/index.js') }}" id="contact-form-7-js"></script>
    <script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}" id="newsflash-jquery-js"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}" id="newsflash-bootstrap-js"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}" id="newsflash-bootstrapbundle-js"></script>
    <script src="{{ asset('frontend/assets/js/stellarnav.min.js') }}" id="newsflash-stellarnav-js"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}" id="newsflash-carousel-js"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}" id="newsflash-magnific-js"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}" id="newsflash-jqueryui-js"></script>
    <script src="{{ asset('frontend/assets/js/lazyload.min.js') }}" id="newsflash-lazyload-js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}" id="newsflash-main-js"></script>

    <script src="https://kit.fontawesome.com/97ff43f8ef.js" crossorigin="anonymous"></script>
</body>

</html>
