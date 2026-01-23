<h1>New News Published!</h1>
<h2>{{ $news->title }}</h2>
<p>{{ Str::limit($news->content, 200) }}</p>
<a href="{{ route('news.show', $news) }}">Read Full Story</a>