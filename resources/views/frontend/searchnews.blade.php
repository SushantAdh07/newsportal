@extends('frontend.frontend')

@section('news')
    @if (count($results) > 0)
        <section class="themesBazar_section_one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8">

                            <div class="sec-one-item2">
                                <div class="row">
                                    @foreach ($results as $item)
                                        <div class="themesBazar-3 themesBazar-m2">

                                            <div class="sec-one-wrpp2">

                                                <div class="secOne-news">
                                                    <div class="secOne-image2">
                                                        <a href="{{ route('details', $item->id) }} "><img class="lazyload"
                                                                src="{{ asset($item->image) }}"></a>
                                                    </div>
                                                    <h4 class="secOne-title2">
                                                        <a
                                                            href="{{ route('details', $item->id) }} ">{{ $item->news_title }}</a>
                                                    </h4>
                                                </div>
                                                <div class="cat-meta">
                                                    <a href=" "> <i class="lar la-newspaper"></i>
                                                        {{ $item->created_at }}
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach







                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    @else
        <p>No results found.</p>
    @endif
@endsection
