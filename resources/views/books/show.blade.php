@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Detalle de libro</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h1>{{$book->title}}</h1>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <p>
                                    Publicado por <a href="#">{{$book->user->name}}</a>
                                    {{$book->created_at->diffForHumans()}}
                                    en <a href="{{$book->category->url}}">{{$book->category->name}}</a>
                                </p>
                                <h3>{{$book->abstract}}</h3>
                            </div>
                            @include('books.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection