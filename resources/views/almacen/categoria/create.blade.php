@extends('layouts.admin')

@section('contenido')
   
<div class="content col-6"> 
    <div class="card card-primary" >
        <div class="card-header">
            <h3 class="card-header">Nueva Categoria</h3>
        </div>
      <div class="card-body">
        <br>
        <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
        <form action="{{ route('categoria.store') }}" method="POST" class="form">
          @csrf
          <div class="mb-3">
            <label for="categoria" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="categoria"  name="categoria"   >
           
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Description</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" >
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="reset" class="btn btn-primary">Cancelar</button>
        </form>
      </div>
    </div>
    
  </div>
@endsection