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
            <td>Nombre completo</td>
            <td>Genero</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        @foreach($funcionarios as $funcionario)
        <tr align="center">
            <td>{{$funcionario->id}}</td>
            <td>{{$funcionario->nombrecompleto}}</td>
            <td>{{$funcionario->genero}}</td>
            <td align="right"><a href="{{ route('funcionario.edit', $funcionario->id)}}"
            class="btn btn-primary">Edit</a></td>
            <td align="left">
            <form action="{{ route('funcionario.destroy', $funcionario->id)}}"
            method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar {{$funcionario->nombrecompleto}}')" >Del</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
@endsection