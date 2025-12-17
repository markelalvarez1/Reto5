@extends('layout.masterpage')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <h1 class="text-center mb-4">Vista en detalle de {{ $producto->name }}</h1>
            <div class="card h-100">
                <img src="{{ asset('images/arepas/' . $producto->image) }}" class="card-img-top" alt="{{ $producto->name }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $producto->name }}</h5>
                    <p class="card-text">
                        {{ $producto->description }} <br>
                        <strong>{{ $producto->price }} €</strong>
                    </p>

                    {{--Sesión iniciada y ese usuario es el dueño de la arepa actual --}}
                    @if(auth()->check() && (auth()->user()->id == $producto->user_id || auth()->user()->isAdmin()))

                    <form class="d-inline" action="{{route('products.destroy', $producto->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                    @if(auth()->user()->isAdmin())
                        <form class="d-inline" action="{{route('products.kill', $producto->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar definitivamente</button>
                        </form>
                    @endif

                    <a href="#" class="btn btn-primary">Editar</a>
                    @endif





                </div>
            </div>

        </div>

    </div>
</div>

@endsection

