@extends('layouts.master')

@section('content')
<div class="row" style="margin-top: 20px;">
    
    {{-- Notificación Flash de Éxito --}}
    @if(session()->has('notification'))
        <div class="alert alert-success col-12 mb-4">
            {{ session('notification') }}
        </div>
    @endif

    <div class="col-sm-4 text-center">
        <img src="{{ \Illuminate\Support\Str::startsWith($pelicula->poster, 'http') ? $pelicula->poster : asset('storage/' . $pelicula->poster) }}" style="height:360px;" class="img-fluid rounded shadow"/>
    </div>
    
    <div class="col-sm-8">
        <h1 class="display-5" style="font-weight: bold;">{{ $pelicula->title }}</h1>
        <p class="lead"><strong>Año:</strong> {{ $pelicula->year }} | <strong>Director:</strong> {{ $pelicula->director }}</p>
        <hr>
        
        <div style="margin-top: 15px;">
            <h5 style="font-weight: bold;">Sinopsis:</h5>
            <p style="text-align: justify;">{{ $pelicula->synopsis }}</p>
            <p><strong>Estado:</strong> 
                @if($pelicula->rented)
                    <span class="badge bg-danger">Película actualmente alquilada</span>
                @else
                    <span class="badge bg-success">Película disponible</span>
                @endif
            </p>
        </div>

        {{-- BOTONERA OPERATIVA CON FORMULARIOS --}}
        <div class="d-flex flex-wrap gap-2" style="margin-top: 30px;">

            <a href="{{ url('/catalog') }}" class="btn btn-secondary">⬅️ Volver al listado</a>

            @if($pelicula->rented)
                {{-- Formulario para Devolver Película --}}
                <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $pelicula->id]) }}" method="POST" style="display:inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-info text-white" style="font-weight: 500;">↩️ Devolver película</button>
                </form>
            @else
                {{-- Formulario para Alquilar Película --}}
                <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putRent'], ['id' => $pelicula->id]) }}" method="POST" style="display:inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-success" style="font-weight: 500;">🔑 Alquilar película</button>
                </form>
            @endif

            <a href="{{ url('/catalog/edit/' . $pelicula->id) }}" class="btn btn-warning text-dark" style="font-weight: 500;">✏️ Editar película</a>

            {{-- Formulario para Eliminar Película --}}
            <form action="{{ action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $pelicula->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta película?')" class="btn btn-danger">🗑️ Eliminar película</button>
            </form>

        </div>
    </div>
</div>
@endsection