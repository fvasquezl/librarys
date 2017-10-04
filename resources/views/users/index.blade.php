@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        {!! Alert::render() !!}
                        {!! Form::open(['method' => 'get','route' =>['users.index'],'class' => 'form form-inline']) !!}
                        {!! Form::text('search',request('search'),['class' => 'form-control']) !!}
                        {!! Form::select('role',trans('options.user-role-search'),request('role'), ['class' => 'form-control']) !!}
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {!! Form::close() !!}
                        <br>
                        <table class="table table-condensed table-bordered">
                            <tr>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{route('users.edit',$user)}}">{{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$users->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
