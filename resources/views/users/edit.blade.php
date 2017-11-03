@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorias</div>
                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
                        {!! Field::text('name',request('name'),['readonly']) !!}
                        {!! Form::select('role',['admin'=>'admin','user'=>'user','guest'=>'guest'],$user->role,['class' => 'form-control']) !!}
                        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
