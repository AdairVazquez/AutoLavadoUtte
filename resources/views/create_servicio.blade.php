
@extends('adminlte::page')

@section('title', 'Servicio')

@section('content_header')
    <h1>SERVICIO NUEVO </h1>
@stop

@section('content')
<form action="{{route('servicio.guardar')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$servicio->id}}">
    <div class="mb-3">
    <label for="" class="form-label">Codigo</label>
    <input type="text" class="form-control boxes" value="{{$servicio->codigo}}" name="txtCodigo" id="">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input type="text" class="form-control boxes" value="{{$servicio->nombre}}" name="txtNombre" id="">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input type="text" class="form-control boxes" value="{{$servicio->descripcion}}" name="txtDescripcion" id="">
    </div>
    <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input type="text" class="form-control boxes" name="txtPrecio" value="{{$servicio->precio}}" id="">
    </div>

    </div>
    <center><button type="submit" class="btn btn-lg btn-primary mb-5">Crear</button></center>
</form>
@if ($servicio->id != 0)
    <label for="myTab">Etapas</label>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach($etapas as $etapa)
            <li class="nav-item" role="{{$etapa->id}}">
            <button class="nav-link " id="{{$etapa->id}}-tab" data-bs-toggle="tab" data-bs-target="#{{$etapa->id}}" type="button" role="tab" aria-controls="{{$etapa->id}}" aria-selected="">{{$etapa->nombre}}</button>
            </li>
            @endforeach
            <li class="nav-item" role="nueva">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#nueva" type="button" role="tab" aria-controls="nueva" aria-selected="false">Nueva Etapa</button>
                </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            @foreach ($etapas as $etapa)
                <div class="tab-pane fade" id="{{$etapa->id}}" role="tabpanel" aria-labelledby="{{$etapa->id}}-tab">
                    <label for="">Duración</label>
                    <p>{{$etapa->duracion}}</p>
                    <label for="">Opciones</label><br>
                    <a href="{{route('etapa.editar',['id' => $etapa['id'],'idserv' => $etapa['id_servicio']])}}" class="btn btn-info btn-sm rounded-0">
                        <span class="far fa-edit">EDITAR :D</span>
                    </a>
                    <form action="{{route('etapa.eliminar',['id' => $etapa['id']])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$etapa['id']}}">
                        <input type="submit" class="btn btn-danger btn-sm rounded-0" value="ELIMINAR D:">
                       </form>
                </div>
            @endforeach
            @php
                $activeTab = request('tab', 'default'); // 'default' es la pestaña por defecto si no se proporciona un parámetro 'tab'
            @endphp
            <div class="tab-pane fade {{ $activeTab == 'nueva' ? 'active show' : '' }}" id="nueva" role="tabpanel" aria-labelledby="nueva">
                
                    @if ($servicio->id == 0)
                    <form action="{{route('etapa.guardar')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$servicio->id}}">
                        <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control boxes" value="" name="txtNombreEtapa" id="">
                        <label for="" class="form-label">Duración</label>
                        <input type="text" class="form-control boxes" value="" name="txtDuracion" id="">
                        <input type="submit" class="btn btn-success mt-3" value="Crear etapa">
                    @else
                    <form action="{{route('etapa.guardar')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$servicio->id}}">
                        <div class="mb-3">
                        <label for="" class="form-label">Nombre</label>
                        <input type="text" class="form-control boxes" value="{{$etapa['nombre']}}" name="txtNombreEtapa" id="">
                        <label for="" class="form-label">Duración</label>
                        <input type="text" class="form-control boxes" value="{{$etapa['duracion']}}" name="txtDuracion" id="">
                        <input type="submit" class="btn btn-success mt-3" value="Editar etapa">
                    @endif
                    </div>
                </form>
            </div>
        </div>
    @endif
    <br>
    <br>
    <br>
    <br>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stop

