@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Funcionario
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
        <form method="post" action="{{ route('funcionario.update', $funcionario->id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" id="nombrecompleto"
                 value="{{$funcionario->nombrecompleto}}"
                 class="form-control" name="nombrecompleto" />
            </div>
            <br>
            <div class="form-group">
                <label for="genero">genero:</label>

                <select name="genero">
                    @php
                        $selectedgeneroH = $funcionario->genero =="H"?" selected ": "";
                        $selectedgeneroM = $funcionario->genero =="M"?" selected ": "";
                    @endphp
                    <option {{$selectedgeneroH}} value="H">Hombre</option>
                    <option {{$selectedgeneroM}} value="M">Mujer</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection