@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorias</div>

                    <div class="panel-body">
                        {!! Alert::render() !!}

                        <a href="{{route('categories.create')}}" class='btn btn-danger pull-right'>Crear Categoria</a>
                        <br><br>
                        <table class="table table-condensed table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                            </tr>

                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td><a href="{{route('categories.edit',$category)}}">{{$category->name}}</a></td>
                                </tr>
                            @endforeach
                        </table>
                        {{$categories->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
