@foreach($posts as $post)
    <article>
        <header>
            <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
            <small>Question posée par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
            <div>
                @foreach($post->categories as $category)
                    <span class="badge badge-success">{{ $category->name }}</span>
                @endforeach
            </div>
        </header>
        {!! Str::limit(nl2br(e($post->content)), 150, '(...)') !!}
    </article>
@endforeach