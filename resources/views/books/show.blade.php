@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Detalle de libro <i class="fa fa-book " aria-hidden="true"></i></h3></div>
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
                                <p>{{$book->abstract}}</p>
                                <hr>
				@if(Auth::check())
                                     @cannot('guest')
                                        <h4>Documento:</h4>
                                        <div>
                                            <i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>
                                            <a  href="{{asset('storage/'.$book->pdfbook)}}" target="_blank"> {{$book->title.'.pdf'}} </a>
                                        </div>
                                    @endcannot
				@endif
                                   @can('admin')
                                    <br>
                                        {!!Form::open(['method'=>'DELETE','route' =>['books.delete',$book],'style'=>'display:inline','onSubmit'=>"return confirm('Are you sure you want to submit this form?');"])!!}
                                        {!!Form::submit('Eliminar_libro',['class'=> 'btn btn-danger']) !!}
                                        {!!Form::close() !!}
                                    @endcan

                            </div>
                            @include('books.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
