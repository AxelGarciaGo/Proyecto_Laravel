@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Eleccion de Comite
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('eleccioncomite.store') }} " 
        enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="idEleccion">ID Eleccion:</label>
                        <input type="text" multiple name="idEleccion" id="idEleccion" list="listaEleccion">
                        <datalist id="listaEleccion">
                        @foreach($eleccion as $eleccionid)
                            @php
                                $valor = $eleccionid->id;
                            @endphp
                            <option value="{{$valor}}">{{$eleccionid->id}}</option>
                        @endforeach
                        </datalist>
                </div>
                <br>
                <div class="form-group">
                    <label for="idFuncionario">ID Funcionario:</label>
                        <input type="text" multiple name="idFuncionario" id="idFuncionario" list="listaFuncionario">
                        <datalist id="listaFuncionario">
                        @foreach($funcionario as $funcionarioid)
                            @php
                                $valor = $funcionarioid->id;
                            @endphp
                            <option value="{{$valor}}">{{$funcionarioid->id}}</option>
                        @endforeach
                        </datalist>
                </div>
                <br>
                <div class="form-group">
                    <label for="idRol">ID Rol:</label>
                        <input type="text" multiple name="idRol" id="idRol" list="listaRol">
                        <datalist id="listaRol">
                        @foreach($roles as $rolesid)
                            @php
                                $valor = $rolesid->id;
                            @endphp
                            <option value="{{$valor}}">{{$rolesid->id}}</option>
                        @endforeach
                        </datalist>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection