@extends('adminlte::page')


@section('title', 'Nuevo usuario')

@section('content_header')
    <h1 class="ml-2">Crear Usuario Nuevos</h1>
@stop
@section('content')
    <style>
        .colorrojo {
            color: red;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header text-center">
                        <h3>Datos usuario</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="name">Nombre <label class="colorrojo">*</label></label>
                                        <input type="text" class="form-control" name="name" required
                                            placeholder="Ingrese su nombre">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="paterno">Apellido Paterno <label class="colorrojo">*</label></label>
                                        <input type="text" class="form-control" name="paterno" required
                                            placeholder="Ingrese su apellido paterno">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="materno">Apellido Materno <label class="colorrojo">*</label></label>
                                        <input type="text" class="form-control" name="materno" required
                                            placeholder="Ingrese su apellido materno">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico <label class="colorrojo">*</label></label>
                                        <input type="email" class="form-control" name="email" required
                                            placeholder="Ingrese su correo electrónico">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="password">Contraseña <label class="colorrojo">*</label></label>
                                        <input type="password" class="form-control" name="password" id="password" required
                                            placeholder="Ingrese su contraseña">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="password_confirm">Confirmar Contraseña <label
                                                class="colorrojo">*</label></label>
                                        <input type="password" class="form-control" id="password_confirm" required
                                            placeholder="Confirme su contraseña">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="area">Área <label class="colorrojo">*</label></label>
                                        <select class="form-control" id="area" name="area" required>
                                            <option value="0" selected disabled>Seleccionar</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="roles">Roles<label class="colorrojo">*</label></label>
                                        <select class="form-control" id="roles" name="roles[]" multiple required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <a href="{{ route('user.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button type="submit" class="btn btn-info btn-block">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
