<article>
    <h4><a href="{{ $book->url }}">{{ $book->title }}</a></h4>

    <p>
        Publicado por <a href="#">{{ $book->user->name }}</a>
        {{ $book->created_at->diffForHumans() }}
        en <a href="{{ $book->category->url }}">{{ $book->category->name }}</a>.
        {{--@if ($book->pending)--}}
            {{--<span class="label label-warning">Pendiente</span>--}}
        {{--@else--}}
            {{--<span class="label label-success">Completado</span>--}}
        {{--@endif--}}

    {{--{{ $book->vote_component }}--}}
    <hr>
</article>