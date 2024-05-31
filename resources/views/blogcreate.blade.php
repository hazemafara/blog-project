@include('includes.navbar')

<div>
    <h2>Create a New Blog Post</h2>

    <form method="POST" action="{{ route('blogstore') }}">
        @csrf
        @method('POST')
        <div>
            <label for="blog_header">Blog Header:</label>
            <input type="text" name="blog_header" value="{{ old('blog_header') }}" required>
            @error('blog_header')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="blog_tekst">Blog Text:</label>
            <textarea name="blog_tekst" required>{{ old('blog_tekst') }}</textarea>
            @error('blog_tekst')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create Blog Post</button>
    </form>
</div>
