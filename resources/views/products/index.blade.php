@extends('layout.masterpage')
@section('content')
    <h1>LISTADO DE PRODUCTOS @if(auth()->check()) <a href="{{route('products.create')}}" class="btn btn-success">Crear</a>@endif</h1>

    @if (isset($productosUser)&& count($productosUser) > 0)
        <div class="row mt-5 p-4" style="background-color:rgba(255, 172, 0, 0.466);">
            <h2 class="mb-3 mt-3">Estos son tus propias Arepas <i class="fa-solid fa-stroopwafel"></i>   Puedes gestionarlas <i class="fa-solid fa-wand-magic-sparkles"></i></h2>
            @foreach ($productosUser as $p)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 " style="width: 18rem;">
                    <img src="{{asset('images/arepas/'. $p->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$p->name}} <span class="badge bg-secondary">{{$p->price}} €</span></h5>
                    <p class="card-text">{{$p->description}}</p>
                    <a href="{{route('products.show',$p->id)}}" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <div class="row mt-5">
        <h2 class="mb-3 mt-3">Otras Arepas <i class="fa-solid fa-stroopwafel"></i></h2>
        @foreach ($productos as $p)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 " style="width: 18rem;">
                <img src="{{asset('images/arepas/'. $p->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{$p->name}} <span class="badge bg-secondary">{{$p->price}} €</span></h5>
                <p class="card-text">{{$p->description}}</p>
                <a href="{{route('products.show',$p->id)}}" class="btn btn-primary">Detalles</a>
                </div>
            </div>
        </div>
         @endforeach
    </div>

    @if(isset($productosEliminados) && count($productosEliminados) > 0)
        <div class="row g-4 bg-danger p-3 rounded mt-5">
            <h3 class="fw-bold text-center mb-3">Productos Eliminados</h3>
            @foreach ($productosEliminados as $p)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('images/arepas/' . $p->image) }}" class="card-img-top" alt="{{ $p->name }}">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $p->name }}</h5>
                            <h6 class="text-success mb-2">{{ $p->price }}$</h6>
                            <p class="card-text text-muted small">{{ $p->description }}</p>

                            <a href="{{ route('products.restore', $p->id) }}" class="btn btn-warning mt-auto">
                                Restaurar Producto
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
