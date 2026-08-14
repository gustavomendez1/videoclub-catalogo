@extends('layouts.master')

@section('content')
<div class="row">

   <div class="row g-4">
        @foreach( $arrayPeliculas as $pelicula )
        <div class="col-6 col-sm-4 col-md-3 text-center">
            <div class="card h-100 bg-dark border-secondary shadow-sm text-white" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                
                <a href="{{ url('/catalog/show/' . $pelicula->id ) }}" class="text-decoration-none text-white">
                    <img src="{{ $pelicula->poster }}" class="card-img-top img-fluid" style="height: 260px; object-fit: cover; border-top-left-radius: 4px; border-top-right-radius: 4px;" alt="{{ $pelicula->title }}"/>
                    
                    <div class="card-body p-2 d-flex flex-column justify-content-center" style="min-height: 65px;">
                        <h5 class="card-title m-0 font-weight-bold" style="font-size: 1rem; line-height: 1.2; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            {{ $pelicula->title }}
                        </h5>
                    </div>
                </a>

            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection