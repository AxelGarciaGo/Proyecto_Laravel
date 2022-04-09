@extends('plantilla')
@section('content')
<style>
    .uper {
    margin-top: 40px;
    }
</style>

<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    <br>
    @endif
    <table class="table table-striped">
    <thead>
        <tr align="center">
            <td>ID</td>
            <td>ID Eleccion de Comite</td>
            <td>ID de Funcionario</td>
            <td>ID de Rol</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        @foreach($ecs as $ec)
        <tr align="center">
            <td>{{$ec->id}}</td>
            <td>{{$ec->eleccion_id}}</td>
            <td>{{$ec->funcionario_id}}</td>
            <td>{{$ec->rol_id}}</td>
            <td align="right"><a href="{{ route('eleccioncomite.edit', $ec->id)}}"
            class="btn btn-primary">Edit</a></td>
            <td align="left">
            <form action="{{ route('eleccioncomite.destroy', $ec->id)}}"
            method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar {{$ec->id}}')" >Del</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
@endsection