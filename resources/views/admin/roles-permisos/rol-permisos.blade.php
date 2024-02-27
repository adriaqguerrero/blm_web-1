@extends('adminlte::page')


@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles y permisos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Rol de {{$role->name}}</h5>
           
        </div>
        <div class="card-body">
            <h5 class="">Listado de Permisos</h5>
            {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                @foreach ($permisos as $permiso)
                    <div class="">
                        <label>
                            {!! Form::checkbox('permisos[]', $permiso->id, 
                            $role->hasPermissionTo($permiso->id)?:false,
                             ['class' => '']) !!}

                            {{ $permiso->name }}
                        </label>
                    </div>
                @endforeach
                
                {!! Form::submit('Guardar permisos', ['class'=>'btn btn-primary mt-3']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop