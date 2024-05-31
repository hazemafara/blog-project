@include('includes.navbar')
   
<h1>Latest</h1>
<p>A blog created with Laravel framework</p>

@foreach ($blogs as $blog)
<div>
    <li>
        <article>
            <div>
                <dl>
                    <dt>Published on</dt>
                    <dd><time datetime="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->format('F j, Y') }}</time></dd>
                </dl>
                <div>
                    <div>
                        <div>
                            <h2><a href="/post/{{ $blog->id }}">{{ $blog->blog_header }}</a></h2>
                            <div>
                                @if(isset($blog->category->name))
                                    <a href="/category/{{ $blog->category->id }}">{{ $blog->category->name }}</a>
                                @endif
                            </div>
                        </div>
                        <div>{{ implode(' ', array_slice(str_word_count($blog->blog_tekst, 1), 0, 27)) }}...</div>
                    </div>
                    <div><a aria-label="Read more: &quot;{{ $blog->blog_header }}&quot;" href="/post/{{ $blog->id }}">Read more →</a></div>
                </div>
            </div>
        </article>
        <div></div>
    </li>
</div>
@endforeach
