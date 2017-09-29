<article>
    <h4><a href="{{ $book->url }}">{{ $book->title }}</a></h4>
    <p>
        Publicado por <a href="#">{{ $book->user->name }}</a>
        {{ $book->created_at->diffForHumans() }}
        en <a href="{{ $book->category->url }}">{{ $book->category->name }}</a>.
    <hr>
</article>