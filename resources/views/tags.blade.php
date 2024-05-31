@include('includes.navbar')

<div>
    <div>
        <h1>Tags</h1>
    </div>
    
    <div>
        @foreach($categories as $category)
            <div><a href="/category/{{ $category->id }}">{{$category->name}}</a></div>
        @endforeach
    </div>
</div>
