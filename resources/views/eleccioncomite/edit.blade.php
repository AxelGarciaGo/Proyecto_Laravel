@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Comite de Eleccion
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
        <form method="post" action="{{ route('eleccioncomite.update', $eleccioncomite->id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                    <label for="idEleccion">ID Eleccion:</label>
                        <input type="text" multiple name="idEleccion" id="idEleccion" list="listaEleccion">
                        <datalist id="listaEleccion">
                        @foreach($eleccion as $eleccionid)
                            @php
                                $valor = $eleccionid->id;
                                $selector=$eleccioncomite->eleccion_id==$eleccionid->id?"selected":"";
                            @endphp
                            <option {{$selector}} value="{{$valor}}" >{{$eleccionid->id}}</option>
                        @endforeach
                        </datalist>
                </div>
                <br>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection