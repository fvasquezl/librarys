@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear un Area de trabajo nueva</div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('areas.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="code" class="control-label">Codigo </label>
                                <input id="code"
                                       type="text"
                                       class="form-control"
                                       name="code"
                                       value="{{ old('code') }}"
                                       required autofocus>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Nombre</label>
                                <input id="name"
                                       type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('access_level_id') ? ' has-error' : '' }}">
                                <label>Nivel de Acceso</label>
                                <select name="access_level_id" class="form-control select2">
                                    <option value="">Seleccione el nivel de acceso</option>
                                    @foreach($accesses as $access)
                                        <option value="{{$access->id}}"
                                                {{old('access_level_id', $access->access_level_id) == $access->id ? 'selected' : ''}}
                                        >{{$access->display_name}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('access_level_id','<span class="help-block">:message</span>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                <label>Area a la que reporta</label>
                                <select name="parent_id" class="form-control select2">
                                    <option value="">Seleccione un area</option>
                                    <option value="0">Nivel0 - Raiz</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}"
                                                {{old('parent_id', $area->parent_id) == $area->id ? 'selected' : ''}}
                                        >{{ucfirst($area->access->name)}} - {{$area->name}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('parent_id','<span class="help-block">:message</span>') !!}
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Area
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


@push('scripts')

@endpush