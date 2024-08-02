@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <table id="table-data" class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Etapas</th>
            <th colspan="2" scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($servicios as $servicios)
        <tr>
            <td>{{$servicios['id']}}</td>
            <td>{{$servicios['codigo']}}</td>
            <td>{{$servicios['nombre']}}</td>
            <td>{{$servicios['descripcion']}}</td>
            <td>{{$servicios['precio']}}</td>

            <td>
                <a href="{{route('servicio.nueva',['id' => $servicios['id']])}}" class="btn btn-success btn-sm rounded-0">
                    <span class="far fa-edit">EDITAR :D</span>
                </a>
            </td>
            <td>
               <form action="{{route('servicio.eliminar',['id' => $servicios['id']])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$servicios['id']}}">
                <input type="submit" class="btn btn-danger btn-sm rounded-0" value="ELIMINAR D:">
               </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
