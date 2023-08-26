@extends('layouts.admin')

@section('contenido')
<div class="content col-6"> 
  <div class="card" >
    <div class="card-body">
      <h5 class="card-title">Editar Categoria </h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">{{ $categoria->categoria }}</h6>
      <form action="{{ route('categoria.update', $categoria->id_categoria ) }}" method="POST" class="form">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="categoria" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="categoria"  name="categoria"  value="{{ $categoria->categoria }}" aria-describedby="emailHelp">
         
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Description</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $categoria->descripcion }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
    </div>
  </div>
  
</div>
@endsection
 