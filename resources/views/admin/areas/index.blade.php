@extends('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{route('areas.create')}}" class="btn btn-primary pull-right">Create Area</a>
                        <h1>Areas</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Nivel de acceso</th>
                                <th>Reporta a:</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($areas as $area)
                                <tr>
                                    <td>{{$area->code}}</td>
                                    <td><a href="{{route('areas.show',$area->url)}}">{{$area->name}}</a></td>
                                    <td>{{$area->access->display_name}}</td>
                                    <td>{{($area->parent ===null) ? 'Admin': $area->parent->code }}</td>
                                    <td>
                                        <a href="{{route('areas.edit',$area)}}" class="btn btn-success btn-sm">Editar</a>
                                        <a href="{{route('areas.destroy',$area)}}" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $areas->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop