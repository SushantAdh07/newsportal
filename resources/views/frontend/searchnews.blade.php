@extends('frontend.frontend')

@section('news')
    @if (count($results) > 0)
        <ul>
            @foreach ($results as $result)
                <li>
                    <a href="{{ route('details', $result->id) }} ">{{ $result->news_title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
@endsection
