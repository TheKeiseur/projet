<ul class="list-unstyled">
    @foreach($comments as $comment)
        <li>
            <article>
                <header>
                    Rédigé par {{ $comment->user()->name }} le {{ $comment->created_at->format('d/m/Y H:i') }}
                </header>
                        
                <p>{!! e(nl2br($comment->content)) !!}</p>
            </article>
        </li>
    @endforeach
</ul>