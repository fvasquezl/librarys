{!! Field::text('name',request('name')) !!}
{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
<a href="{{route('categories.index')}}" class="btn btn-danger">Retornar</a>