@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        {!! Form::model($user, array('route' => array('users.update', $user))) !!}
                        {!! Field::text('name',request('name')) !!}
                        {!! Field::email('email',request('email')) !!}
                        {!! Field::select('role',trans('options.user-role'),request('role'),['empty' => false]) !!}
                        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
