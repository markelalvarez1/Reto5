@extends('layout.masterpage')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Crear una nueva Arepa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea
                                name="description"
                                class="form-control"
                                rows="4"
                                required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input
                                type="number"
                                name="price"
                                step="0.01"
                                min="1"
                                class="form-control value="{{ old('price') }}"
                                required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagen</label>
                            <input
                                type="file"
                                name="image"
                                accept="image/*"
                                class="form-control @error('image') is-invalid @enderror"
                            >
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Producto</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
