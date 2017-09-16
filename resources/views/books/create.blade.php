@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar un libro</div>
                        <div class="panel-body">
                            {!!Form::open(['method'=>'PUT', 'route'=>'books.store','files' => true]) !!}
                            {!! Field::text('title')!!}
                            {!! Field::textarea('abstract') !!}
                            {!! Field::file('pdfbook') !!}
                            {!! Field::select('category_id', $categories) !!}

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Publicar
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
