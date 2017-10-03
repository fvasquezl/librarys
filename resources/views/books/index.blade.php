@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3> {{ $category && $category->exists ? 'Libros de '.$category->name : 'Libros' }}</h3>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @include('books.sidebar')
                            <div class="col-md-10">
                                {!! Alert::render() !!}

                                {!! Form::open(['method' => 'get', 'class' => 'form form-inline']) !!}
                                {!! Form::text('search',request('search'),['class' => 'form-control']) !!}
                                {!! Form::select('orden',trans('options.books-order'),request('orden'), ['class' => 'form-control']) !!}
                                <button type="submit" class="btn btn-primary">Ordenar</button>
                                {!! Form::close() !!}

                                @each('books.item ', $books, 'book')

                                {{ $books->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection