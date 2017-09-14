@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Book</div>
                        <div class="panel-body">
                            {!!Form::open(['method'=>'PUT', 'route'=>'books.store','files' => true]) !!}
                            {!! Field::text('title')!!}
                            {!! Field::textarea('abstract') !!}
                            {!! Field::file('pdfbook') !!}
                            {!! Field::select('category_id', $categories) !!}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Publicar
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
